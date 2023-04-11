<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\User\StoreUserData;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Users\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(protected UserService $userService)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index()
    {
        return new UserCollection($this->userService->index());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(User::findOrfail($id));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json(User::findOrfail($id)->delete(), 204);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->location = $request->location;
        $user->save();
        return response()->json(
            new UserResource(
                $this->userService->create(StoreUserData::from($request)),
                Response::HTTP_CREATED
            )
        );
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->location = $request->location;
        $user->save();
        return response()->json($user);
    }
}
