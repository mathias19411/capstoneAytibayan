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
                'password' => Hash::make('itstaff123'),
                'phone' => '09998887777',
                'primary_address' => 'Purok 3 Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '1',
                'program_id' => '2',
                'status_id' => '1',
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
                'role_id' => '2',
                'program_id' => '1',
                'status_id' => '1',
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
                'role_id' => '3',
                'program_id' => '1',
                'status_id' => '1',
            ],
            //Personal Sample Account
            [
                'first_name' => 'Mathias John Oliver',
                'middle_name' => 'Bagato',
                'last_name' => 'Bermejo',
                'email' => 'bermejomathiasjohnoliver@gmail.com',
                'password' => Hash::make('mathias1999'),
                'phone' => '09998887777',
                'primary_address' => 'Purok 3 Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '1',
                'program_id' => '1',
                'status_id' => '1',
            ]

        ]);
    }
}
