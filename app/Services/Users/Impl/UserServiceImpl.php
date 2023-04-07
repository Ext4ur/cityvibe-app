<?php

namespace App\Services\Users\Impl;

use App\Models\User;
use App\Models\Breed;
use App\Services\Users\UserService;
use Illuminate\Support\Collection;

class UserServiceImpl implements UserService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return User::orderBy('id', 'desc')->get();
    }
}
