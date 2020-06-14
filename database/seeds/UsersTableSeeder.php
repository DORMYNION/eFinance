<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => '$2y$10$E8Hm/.JJ59YglKn5TthbLO6WuSFgM4slOf9WHuNtl7/vtp1zqPRUu',
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2020-05-24 01:49:29',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
