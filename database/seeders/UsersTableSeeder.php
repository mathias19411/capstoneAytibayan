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
                'name' => 'IT Staff',
                // 'username' => 'itstaff',
                'email' => 'itstaff@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '09998887777',
                'address' => 'Legazpi City',
                'role' => 'itstaff',
                'status' => 'active',
            ],
            //Project Coordinator
            [
                'name' => 'Project Coordinator',
                // 'username' => 'projectcoordinator',
                'email' => 'projectcoordinator@gmail.com',
                'password' => Hash::make('coordinator123'),
                'phone' => '09998887777',
                'address' => 'Legazpi City',
                'role' => 'project_coordinator',
                'status' => 'active',
            ],
            //Beneficiary
            [
                'name' => 'Beneficiary',
                // 'username' => 'beneficiary',
                'email' => 'beneficiary@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '09998887777',
                'address' => 'Legazpi City',
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
