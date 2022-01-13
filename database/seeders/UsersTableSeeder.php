<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                  => 1,
                'name'                => 'Admin',
                'email'               => 'admin@admin.com',
                'password'            => bcrypt('password'),
                'remember_token'      => null,
                'verified'            => 1,
                'verified_at'         => '2021-12-24 06:12:51',
                'two_factor_code'     => '',
                'verification_token'  => '',
                'middle_name'         => '',
                'last_name'           => '',
                'country_code'        => '',
                'country'             => '',
                'state'               => '',
                'postal_code'         => '',
                'nin_ssn_id_number'   => '',
                'usdt_trc_20_address' => '',
                'is_admin'            => '',
                'is_tutor'            => '',
                'email_is_verified'   => '',
                'user_is_verified'    => '',
                'level'               => '',
                'phone_number'        => '',
                'eth_address'         => '',
                'is_elite'            => '',
                'is_pro'              => '',
                'username'            => '',
            ],
        ];

        User::insert($users);
    }
}
