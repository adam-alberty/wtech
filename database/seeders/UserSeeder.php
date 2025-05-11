<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['first_name' => 'user', 'last_name' => 'user', 'email' => 'user@gmail.com', 'password_hash' => '$2y$12$/BAJzn8UcZqRmVY1Dtrk4O1itI.34Akencj1rvHL8GAIdqhMo.JYe'],
            ['first_name' => 'admin', 'last_name' => 'admin', 'email' => 'admin@gmail.com', 'role' => 'admin', 'password_hash' => '$2y$12$/BAJzn8UcZqRmVY1Dtrk4O1itI.34Akencj1rvHL8GAIdqhMo.JYe'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
