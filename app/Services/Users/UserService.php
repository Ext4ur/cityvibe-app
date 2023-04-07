<?php

namespace App\Services\Users;

use Illuminate\Support\Collection;

interface UserService
{
    /**
     * @return Collection
     */
    public function index(): Collection;
}
