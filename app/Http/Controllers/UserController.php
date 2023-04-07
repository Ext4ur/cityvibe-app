<?php

namespace App\Http\Controllers;

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
    public function index(Request $request): JsonResponse
    {
        return response()->json($this->userService->index());
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
        $user->isbn = $request->isbn;
        $user->language = $request->language;
        $user->name = $request->name;
        $user->pages = $request->pages;
        $user->save();
        return response()->json($user);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $user = User::findOrfail($id);
        $user->isbn = $request->isbn;
        $user->language = $request->language;
        $user->name = $request->name;
        $user->pages = $request->pages;
        $user->save();
        return response()->json($user);
    }
}
