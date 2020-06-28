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
                'password'           => '$2y$10$z4S5iJxHwEvP6GzaXFrsbuf97y54OynQMiha4xh9T.DbslbV/NCvS',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-06-25 10:04:14',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
