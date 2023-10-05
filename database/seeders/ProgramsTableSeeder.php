<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            //Binhi
            [
                // 'project_coordinator_id' => '1',
                'program_name' => 'binhingpagasa'
            ],
            //Akbay
            [
                // 'project_coordinator_id' => '3',
                'program_name' => 'akbay'
            ],
            //Lead
            [
                // 'project_coordinator_id' => '5',
                'program_name' => 'lead'
            ],
            //AgriPinay
            [
                // 'project_coordinator_id' => '9',
                'program_name' => 'agripinay'
            ],
            //Abaka
            [
                // 'project_coordinator_id' => '11',
                'program_name' => 'abakamopisomo'
            ],
        ]);
    }
}