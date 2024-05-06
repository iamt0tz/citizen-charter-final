<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          // Creating admin user
          User::create(
            [
            'name' => 'Siquijor User',
            'email' => 'siquijor@dswd.gov.ph',
            'password' => Hash::make('P@ssw0rd'),
            'division_id' => 1,
            'is_admin' => 1,
            ],
            [
            'name' => 'Admin User',
            'email' => 'admin@dswd.gov.ph',
            'password' => Hash::make('P@ssw0rd_fo7'),
            'division_id' => 1,
            'is_admin' => 1,
            ]
    );
    }
}
