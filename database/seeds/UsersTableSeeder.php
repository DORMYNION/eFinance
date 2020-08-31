<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // User::truncate();
        DB::table('role_user')->truncate();
        

        $adminRole = Role::where('name', 'Admin')->first();
        $staffRole = Role::where('name', 'Staff')->first();
        $userRole  = Role::where('name', 'User')->first();
        
        $admin = User::create([
            'bvn'                                       => rand(11111111111, 99999999999),
            'name'                                      => 'EFinance Admin',
            'title'                                     => '',
            'email'                                     => 'admin@admin.com',
            'gender'                                    => '',
            'status'                                    => 'Active',
            'address'                                   => '',
            'password'                                  => Hash::make('password'),
            'verified'                                  => 1,
            'land_mark'                                 => '',
            'last_name'                                 => 'Admin',
            'bank_name'                                 => '',
            'account_no'                                => rand(0000000000, 9999999999),
            'first_name'                                => 'Efinance',
            'mobile_no_1'                               => '',
            'mobile_no_2'                               => '',
            'verified_at'                               => now(),
            'account_name'                              => 'Efinance Account',
            'date_of_birth'                             => '2020-07-13',
            'marital_status'                            => '',
            'remember_token'                            => null,
            'employers_name'                            => '',
            'monthly_income'                            => 0.00,
            'employers_state'                           => '',
            'employment_sector'                         => '',
            'employers_address'                         => '',
            'state_of_residence'                        => '',
            'verification_token'                        => '',
            'employers_land_mark'                       => '',
            'status_of_residence'                       => '',
            'employers_local_government_area'           => '',
            'local_government_area_of_residence'        => '',
        ]);

        $staff = User::create([
            'bvn'                                       => rand(11111111111, 99999999999),
            'name'                                      => 'EFinance Staff',
            'title'                                     => '',
            'email'                                     => 'staff@staff.com',
            'gender'                                    => '',
            'status'                                    => 'Active',
            'address'                                   => '',
            'password'                                  => Hash::make('password'),
            'verified'                                  => 1,
            'land_mark'                                 => '',
            'last_name'                                 => 'Staff',
            'bank_name'                                 => '',
            'account_no'                                => rand(0000000000, 9999999999),
            'first_name'                                => 'Efinance',
            'mobile_no_1'                               => '',
            'mobile_no_2'                               => '',
            'verified_at'                               => now(),
            'account_name'                              => 'Efinance Account',
            'date_of_birth'                             => '2020-07-13',
            'marital_status'                            => '',
            'remember_token'                            => null,
            'employers_name'                            => '',
            'monthly_income'                            => 0.00,
            'employers_state'                           => '',
            'employment_sector'                         => '',
            'employers_address'                         => '',
            'state_of_residence'                        => '',
            'verification_token'                        => '',
            'employers_land_mark'                       => '',
            'status_of_residence'                       => '',
            'employers_local_government_area'           => '',
            'local_government_area_of_residence'        => '',
        ]);

        $user = User::create([
            'bvn'                                       => '22221622436',
            'name'                                      => 'Dominion Olorunfemi',
            'title'                                     => 'Mr',
            'email'                                     => 'dlorunfemi@gmail.com',
            'gender'                                    => 'Male',
            'status'                                    => 'Active',
            'address'                                   => 'Jelili Opebiyi',
            'password'                                  => '$2y$10$z4S5iJxHwEvP6GzaXFrsbuf97y54OynQMiha4xh9T.DbslbV/NCvS',
            'verified'                                  => 1,
            'land_mark'                                 => 'White Sand',
            'last_name'                                 => 'Olorunfemi',
            'bank_name'                                 => 'First Bank of Nigeria',
            'account_no'                                => '3093333453',
            'first_name'                                => 'Dominion',
            'mobile_no_1'                               => '09091652799',
            'mobile_no_2'                               => '12345678900',
            'verified_at'                               => now(),
            'account_name'                              => 'Dominion Olorunfemi',
            'date_of_birth'                             => '1997-04-21',
            'marital_status'                            => 'Single',
            'remember_token'                            => null,
            'employers_name'                            => 'DT Solutions',
            'monthly_income'                            => 1200000.00,
            'employers_state'                           => 'Lagos',
            'employment_sector'                         => 'Engineering',
            'employers_address'                         => 'Jelili Opebiyi',
            'state_of_residence'                        => 'Lagos',
            // 'verification_token'                        => '',
            'employers_land_mark'                       => 'White Sand',
            'status_of_residence'                       => 'Commercial Renting',
            'employers_local_government_area'           => 'Alimosho',
            'local_government_area_of_residence'        => 'Alimosho',
    ]);

        $admin->roles()->attach($adminRole);
        $admin->roles()->attach($staffRole);
        $staff->roles()->attach($staffRole);
        $user->roles()->attach($userRole);
    }
}

