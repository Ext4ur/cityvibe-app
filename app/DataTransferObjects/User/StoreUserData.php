<?php

namespace App\DataTransferObjects\User;

use Spatie\LaravelData\Data;

class StoreUserData extends Data
{
    public function __construct(
        public string $name,
        public string $age,
        public string $email,
        public string $password,
    ) {
    }
}

