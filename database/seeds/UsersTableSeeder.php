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
        $userRole  = Role::where('name', 'User')->first();
        
        $admin = User::create([
            'bvn'                                       => '1234567890',
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
            'account_no'                                => '',
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



        $user1 = User::create([
            'bvn'                                       => '22179626766',
            'name'                                      => 'Dolapo Taiwo',
            "title"                                     => "Mr",
            "email"                                     => "dolapo@unotechmedia.com",
            "gender"                                    => "Male",
            'status'                                    => 'Active',
            "address"                                   => "8 rafiat ayinke tinudu close oniru",
            "password"                                  => '$2y$10$z4S5iJxHwEvP6GzaXFrsbuf97y54OynQMiha4xh9T.DbslbV\/NCvS',
            'verified'                                  => 1,
            "land_mark"                                 => "ebeano",
            "last_name"                                 => "TAIWO",
            "bank_name"                                 => "Guaranty Trust Bank",
            "account_no"                                => "0030108506",
            "first_name"                                => "ADEDOLAPO",
            "mobile_no_1"                               => "08039672216",
            "mobile_no_2"                               => "08039672216",
            'verified_at'                               => now(),
            "account_name"                              => "dolapo taiwo",
            "date_of_birth"                             => "1983-09-08",
            'marital_status'                            => 'Single',
            "remember_token"                            => "4b2ada4fb62bcf35149b7042cdd3a662",
            "employers_name"                            => "unotech media",
            "monthly_income"                            => "400000.00",
            "employers_state"                           => "Lagos",
            "employers_address"                         => "7 ibiyinka olorunbe close VI",
            "employment_sector"                         => "Others",
            "state_of_residence"                        => "Lagos",
            // 'verification_token'                        => '',
            "employers_land_mark"                       => "saka tinubu",
            "status_of_residence"                       => "TENANT",
            "employers_local_government_area"           => "Eti Osa",
            "local_government_area_of_residence"        => "Eti Osa",
        ]);

        // $user2 = User::create([
        //     'bvn'                                       => '22202389778',
        //     'name'                                      => 'Adetutu Odufuye',
        //     "title"                                     => "Mrs",
        //     "email"                                     => "adey2_2@yahoo.co.uk",
        //     "gender"                                    => "Female",
        //     'status'                                    => 'Active',
        //     "address"                                   => "ARC GARY SANUSI CLOSE JAKANDE LEKKI",
        //     "password"                                  => '$2y$10$z4S5iJxHwEvP6GzaXFrsbuf97y54OynQMiha4xh9T.DbslbV\/NCvS',
        //     'verified'                                  => 1,
        //     "land_mark"                                 => "JAKANDE",
        //     "last_name"                                 => "ODUFUYE",
        //     "bank_name"                                 => "Access Bank",
        //     "account_no"                                => "0066427448",
        //     "first_name"                                => "ADETUTU",
        //     "mobile_no_1"                               => "08023050606",
        //     "mobile_no_2"                               => "08023050606",
        //     'verified_at'                               => now(),
        //     "account_name"                              => "ADETUTU ODUFUYE",
        //     "date_of_birth"                             => "1979-10-23",
        //     'marital_status'                            => 'Married',
        //     "remember_token"                            => "a08d1a1d4c80a68009453f4afd0cf181",
        //     "employers_name"                            => "NOKIA",
        //     "monthly_income"                            => "1500000.00",
        //     "employers_state"                           => "Lagos",
        //     "employers_address"                         => "OLUBUNMI OWA LEKKI",
        //     "employment_sector"                         => "Telecoms",
        //     "state_of_residence"                        => "Lagos",
        //     'verification_token'                        => '',
        //     "employers_land_mark"                       => "ADMIRALTY WAY",
        //     "status_of_residence"                       => "OWNER",
        //     "employers_local_government_area"           => "Eti Osa",
        //     "local_government_area_of_residence"        => "Ibeju-Lekki",
        // ]);

        // $user3 = User::create([
        //     'bvn'                                       => '22299773328',
        //     'name'                                      => 'Nike Kuti',
        //     "title"                                     => "Mrs",
        //     "email"                                     => "NIKE@GMAIL.COM",
        //     "gender"                                    => "Female",
        //     'status'                                    => 'Active',
        //     "address"                                   => "IKOYI ",
        //     "password"                                  => '$2y$10$z4S5iJxHwEvP6GzaXFrsbuf97y54OynQMiha4xh9T.DbslbV\/NCvS',
        //     'verified'                                  => 1,
        //     "land_mark"                                 => "JAKANDE",
        //     "last_name"                                 => "kuti",
        //     "bank_name"                                 => "Citibank",
        //     "account_no"                                => "1780022335",
        //     "first_name"                                => "adenike",
        //     "mobile_no_1"                               => "08161745233",
        //     "mobile_no_2"                               => "08161745233",
        //     'verified_at'                               => now(),
        //     "account_name"                              => "NIKE KUTI",
        //     "date_of_birth"                             => "1985-03-23",
        //     'marital_status'                            => 'Married',
        //     "remember_token"                            => "f5bc0768d6d0df9f73e65c5210d9488a",
        //     "employers_name"                            => "SEPLAT",
        //     "monthly_income"                            => "5000000.00",
        //     "employers_state"                           => "Lagos",
        //     "employers_address"                         => "LEKKI",
        //     "employment_sector"                         => "Oil & Gas",
        //     "state_of_residence"                        => "Lagos",
        //     'verification_token'                        => '',
        //     "employers_land_mark"                       => "ADMIRALTY WAY",
        //     "status_of_residence"                       => "OWNER",
        //     "employers_local_government_area"           => "Eti Osa",
        //     "local_government_area_of_residence"        => "Apapa",
        // ]);

        // $user4 = User::create([
        //     'bvn'                                       => '22141720964',
        //     'name'                                      => 'Adetomi Odufuye',
        //     "title"                                     => "Mr",
        //     "email"                                     => "etaoko@yahoo.co.uk",
        //     "gender"                                    => "Male",
        //     'status'                                    => 'Active',
        //     "address"                                   => "BANANA ISLAND IKOYI",
        //     "password"                                  => '$2y$10$z4S5iJxHwEvP6GzaXFrsbuf97y54OynQMiha4xh9T.DbslbV\/NCvS',
        //     'verified'                                  => 1,
        //     "land_mark"                                 => "BOURDILLON ROAD",
        //     "last_name"                                 => "ODUFUYE",
        //     "bank_name"                                 => "Polaris Bank",
        //     "account_no"                                => "1780000002",
        //     "first_name"                                => "ADETOMI",
        //     "mobile_no_1"                               => "08060543479",
        //     "mobile_no_2"                               => "08060543479",
        //     'verified_at'                               => now(),
        //     "account_name"                              => "ADETOMI ETAOKO ODUFUYE",
        //     "date_of_birth"                             => "1977-11-10",
        //     'marital_status'                            => 'Married',
        //     "remember_token"                            => "05acadc94949f05212c83e2c4243762d",
        //     "employers_name"                            => "E - FINANCE COMPANY LTD.",
        //     "monthly_income"                            => "4800000.00",
        //     "employers_state"                           => "Lagos",
        //     "employers_address"                         => "IKOYI",
        //     "employment_sector"                         => "Banking",
        //     "state_of_residence"                        => "Lagos",
        //     'verification_token'                        => '',
        //     "employers_land_mark"                       => "IKOYI",
        //     "status_of_residence"                       => "OWNER",
        //     "employers_local_government_area"           => "Eti Osa",
        //     "local_government_area_of_residence"        => "Eti Osa",
        // ]);


        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $user1->roles()->attach($userRole);
        // $user2->roles()->attach($userRole);
        // $user3->roles()->attach($userRole);
        // $user4->roles()->attach($userRole);
    }
}

