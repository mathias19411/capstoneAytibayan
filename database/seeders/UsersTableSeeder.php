<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //IT Staff
            [
                'first_name' => 'IT Staff',
                'middle_name' => 'of',
                'last_name' => 'Apao',
                'email' => 'itstaff@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '09998887777',
                'primary_address' => 'Purok 3 Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role' => 'itstaff',
                'status' => 'active',
            ],
            //Project Coordinator
            [
                'first_name' => 'Project Coordinator',
                'middle_name' => 'of',
                'last_name' => 'Apao',
                'email' => 'projectcoordinator@gmail.com',
                'password' => Hash::make('coordinator123'),
                'phone' => '09998887777',
                'primary_address' => 'Purok 3 Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role' => 'project_coordinator',
                'status' => 'active',
            ],
            //Beneficiary
            [
                'first_name' => 'Beneficiary',
                'middle_name' => 'of',
                'last_name' => 'Apao',
                'email' => 'beneficiary@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '09998887777',
                'primary_address' => 'Purok 3 Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role' => 'beneficiary',
                'status' => 'inactive',
            ]
            //Personal Sample Account
            // [
            //     'name' => 'Mathias John Oliver B. Bermejo',
            //     'username' => 'mathias1941',
            //     'email' => 'bermejomathiasjohnoliver@gmail.com',
            //     'password' => Hash::make('mathias1941'),
            //     'phone' => '09923034018',
            //     'address' => 'Legazpi City',
            //     'role' => 'beneficiary',
            //     'status' => 'active',
            // ]

        ]);
    }
}
