<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Camilo';
        $user->age = 22;
        $user->email = 'camilo@cami.com';
        $user->password = '123456';
        $user->location = 'Calle 68 #49';
        $user->save();
    }
}
