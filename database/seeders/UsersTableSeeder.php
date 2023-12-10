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
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '1',
                'program_id' => '2',
                'status_id' => '1',
            ],
            //BINHIProject Coordinator
            [
                'first_name' => 'Grace',
                'middle_name' => 'P.',
                'last_name' => 'Teaño',
                'email' => 'bermejomathiasjohnoliver2@gmail.com',
                'password' => Hash::make('coordinator123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '2',
                'program_id' => '1',
                'status_id' => '1',
            ],
            //ABAKAProject Coordinator
            [
                'first_name' => 'Eve',
                'middle_name' => 'M.',
                'last_name' => 'Espinas',
                'email' => 'bermejomathiasjohnoliver3@gmail.com',
                'password' => Hash::make('abakazcoordinator123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '3',
                'program_id' => '5',
                'status_id' => '1',
            ],
            //AGRIPINAYProject Coordinator
            [
                'first_name' => 'Diverlyn',
                'middle_name' => 'S.',
                'last_name' => 'Nabors',
                'email' => 'bermejomathiasjohnoliver4@gmail.com',
                'password' => Hash::make('coordinator123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '4',
                'program_id' => '4',
                'status_id' => '1',
            ],
            //AKBAYProject Coordinator
            [
                'first_name' => 'Arminda',
                'middle_name' => 'A.',
                'last_name' => 'Padilla',
                
                'email' => 'bermejomathiasjohnoliver5@gmail.com',
                'password' => Hash::make('coordinator123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '5',
                'program_id' => '2',
                'status_id' => '1',
            ],
            //LEADProject Coordinator
            [
                'first_name' => 'Arminda',
                'middle_name' => 'A.',
                'last_name' => 'Padilla',
                'email' => 'annver005@gmail.com',
                'password' => Hash::make('coordinator123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '6',
                'program_id' => '3',
                'status_id' => '1',
            ],
            //abaka Beneficiary  
            [
                'first_name' => 'Joel',
                'middle_name' => 'B.',
                'last_name' => 'Almario',
                'email' => 'logicabegino@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Pinagbobong',
                'city' => 'Tabaco',
                'province' => 'Albay',
                'zip' => '4511',
                'role_id' => '7',
                'program_id' => '5',
                'status_id' => '1',
            ], 
            [
                 'first_name' => 'Jocelyn',
                 'middle_name' => 'L.',
                 'last_name' => 'Reyes',
                 'email' => 'jreyes@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Nahapunan',
                 'city' => 'Bacacay City',
                 'province' => 'Albay',
                 'zip' => '4509',
                 'role_id' => '7',
                 'program_id' => '5',
                 'status_id' => '1',
            ], 
            [
                 'first_name' => 'Teresita',
                 'middle_name' => 'B.',
                 'last_name' => 'Cruz',
                 'email' => 'tbcruz@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Damacan',
                 'city' => 'Bacacay City',
                 'province' => 'Albay',
                 'zip' => '4509',
                 'role_id' => '7',
                 'program_id' => '5',
                 'status_id' => '1',
             ], 
             [
                  'first_name' => 'Mark',
                  'middle_name' => 'C.',
                  'last_name' => 'Bautista',
                  'email' => 'mcbautista@gmail.com',
                  'password' => Hash::make('beneficiary123'),
                  'phone' => '639923034018',
                  'barangay' => 'Guadalupe',
                  'city' => 'Rapu-rapu City',
                  'province' => 'Albay',
                  'zip' => '4517',
                  'role_id' => '7',
                  'program_id' => '5',
                  'status_id' => '1',
              ], 
              [
                   'first_name' => 'Myrna',
                   'middle_name' => 'B.',
                   'last_name' => 'Rosario',
                   'email' => 'mbrosario@gmail.com',
                   'password' => Hash::make('beneficiary123'),
                   'phone' => '639923034018',
                   'barangay' => 'Poblacion',
                   'city' => 'Rapu-rapu City',
                   'province' => 'Albay',
                   'zip' => '4517',
                   'role_id' => '7',
                   'program_id' => '5',
                   'status_id' => '1',
               ], 
               [
                    'first_name' => 'Eduardo',
                    'middle_name' => 'E.',
                    'last_name' => 'Martinez',
                    'email' => 'eemartinez@gmail.com',
                    'password' => Hash::make('beneficiary123'),
                    'phone' => '639923034018',
                    'barangay' => 'Nagotgot',
                    'city' => 'Manito City',
                    'province' => 'Albay',
                    'zip' => '4514',
                    'role_id' => '7',
                    'program_id' => '5',
                    'status_id' => '1',
                ], 
                [
                    'first_name' => 'Arlene',
                    'middle_name' => 'C.',
                    'last_name' => 'Cruz',
                    'email' => 'accruz@gmail.com',
                    'password' => Hash::make('beneficiary123'),
                    'phone' => '639923034018',
                    'barangay' => 'Buyo',
                    'city' => 'Rapu-rapu City',
                    'province' => 'Albay',
                    'zip' => '4517',
                    'role_id' => '7',
                    'program_id' => '5',
                    'status_id' => '1',
                ],
            //Personal Sample Account
            [
                'first_name' => 'Mathias John Oliver',
                'middle_name' => 'Bagato',
                'last_name' => 'Bermejo',
                'email' => 'bermejomathiasjohnoliver@gmail.com',
                'password' => Hash::make('mathias1999'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '1',
                'program_id' => '1',
                'status_id' => '1',
            ],
            [
                'first_name' => 'Mathias John Oliver',
                'middle_name' => 'Bagato',
                'last_name' => 'Bermejo',
                'email' => 'danielluisserafica11@gmail.com',
                'password' => Hash::make('itstaff123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi City',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '1',
                'program_id' => '1',
                'status_id' => '1',
            ],
            //agripinay Beneficiary 
            // [
            //     'first_name' => 'Jerry',
            //     'middle_name' => 'D.',
            //     'last_name' => 'Enriquez',
            //     'email' => 'orlyencabo08@gmail.com',
            //     'password' => Hash::make('beneficiary123'),
            //     'phone' => '639923034018',
            //     'barangay' => 'Alcala',
            //     'city' => 'Daraga',
            //     'province' => 'Albay',
            //     'zip' => '4501',
            //     'role_id' => '7',
            //     'program_id' => '4',
            //     'status_id' => '1',
            // ], 
            [
                'first_name' => 'Jose',
                'middle_name' => 'B.',
                'last_name' => 'Reyes',
                'email' => 'jbreyes@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Manumbalay',
                'city' => 'Manito',
                'province' => 'Albay',
                'zip' => '4514',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Roberto',
                'middle_name' => 'D.',
                'last_name' => 'Jimenez',
                'email' => 'rdjimenez@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Cawayan',
                'city' => 'Manito',
                'province' => 'Albay',
                'zip' => '4514',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Rosemarie',
                'middle_name' => 'A.',
                'last_name' => 'Vergara',
                'email' => 'ravergara@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Balasbas',
                'city' => 'Manito',
                'province' => 'Albay',
                'zip' => '4514',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Virginia',
                'middle_name' => 'L.',
                'last_name' => 'Aquino',
                'email' => 'vlaquino@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Poblacion',
                'city' => 'Rapu-rapu',
                'province' => 'Albay',
                'zip' => '4517',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Noel',
                'middle_name' => 'C.',
                'last_name' => 'Espenosa',
                'email' => 'ncespenosa@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Malobago',
                'city' => 'Manito',
                'province' => 'Albay',
                'zip' => '4514',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Gina',
                'middle_name' => 'B.',
                'last_name' => 'Santiago',
                'email' => 'gbsantiago@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Tambilagao',
                'city' => 'Bacacay',
                'province' => 'Albay',
                'zip' => '4509',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ],
            [
                'first_name' => 'Catalina',
                'middle_name' => 'B.',
                'last_name' => 'Raguin',
                'email' => 'olivajoriza@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Tambilagao',
                'city' => 'Bacacay',
                'province' => 'Albay',
                'zip' => '4509',
                'role_id' => '7',
                'program_id' => '4',
                'status_id' => '1',
            ],
            //akbay Beneficiary 
            [
                'first_name' => 'Joseph',
                'middle_name' => 'L.',
                'last_name' => 'Perez',
                'email' => 'jlperez@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Nahapunan',
                'city' => 'Bacacay',
                'province' => 'Albay',
                'zip' => '4509',
                'role_id' => '7',
                'program_id' => '2',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Norma',
                'middle_name' => 'A.',
                'last_name' => 'Alcantara',
                'email' => 'naalcantara@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Damacan',
                'city' => 'Bacacay',
                'province' => 'Albay',
                'zip' => '4509',
                'role_id' => '7',
                'program_id' => '2',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Rowena',
                'middle_name' => 'G.',
                'last_name' => 'Infante',
                'email' => 'rginfante@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Poblacion',
                'city' => 'Rapu-rapu',
                'province' => 'Albay',
                'zip' => '4517',
                'role_id' => '7',
                'program_id' => '2',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Joel',
                'middle_name' => 'J.',
                'last_name' => 'Arcilla',
                'email' => 'jjarcilla@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Guadalupe',
                'city' => 'Rapu-rapu',
                'province' => 'Albay',
                'zip' => '4517',
                'role_id' => '7',
                'program_id' => '2',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Ricardo',
                'middle_name' => 'T.',
                'last_name' => 'Grande',
                'email' => 'rtgrande@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '7',
                'program_id' => '2',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Mark',
                'middle_name' => 'P.',
                'last_name' => 'Salas',
                'email' => 'mpsalas@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Tamaoyan',
                'city' => 'Legazpi',
                'province' => 'Albay',
                'zip' => '4500',
                'role_id' => '7',
                'program_id' => '2',
                'status_id' => '1',
            ],
            //lead Beneficiary 
            [
                 'first_name' => 'John',
                 'middle_name' => 'P.',
                 'last_name' => 'Tenorio',
                 'email' => 'jptenorio@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Bamban',
                 'city' => 'Manito',
                 'province' => 'Albay',
                 'zip' => '4514',
                 'role_id' => '7',
                 'program_id' => '3',
                 'status_id' => '1',
            ], 
            [
                 'first_name' => 'Rodulfo',
                 'middle_name' => 'A.',
                 'last_name' => 'Monuz',
                 'email' => 'ramonuz@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Tamaoyan',
                 'city' => 'Legazpi',
                 'province' => 'Albay',
                 'zip' => '4500',
                 'role_id' => '7',
                 'program_id' => '3',
                 'status_id' => '1',
            ], 
            [
                 'first_name' => 'Rosemarie',
                 'middle_name' => 'D.',
                 'last_name' => 'Claro',
                 'email' => 'rdclaro@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Poblacion',
                 'city' => 'Rapu-rapu',
                 'province' => 'Albay',
                 'zip' => '4517',
                 'role_id' => '7',
                 'program_id' => '3',
                 'status_id' => '1',
            ], 
            [
                 'first_name' => 'Marlon',
                 'middle_name' => 'B.',
                 'last_name' => 'Lazaro',
                 'email' => 'mblazaro@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Guadalupe',
                 'city' => 'Rapu-rapu',
                 'province' => 'Albay',
                 'zip' => '4517',
                 'role_id' => '7',
                 'program_id' => '3',
                 'status_id' => '1',
            ], 
            [
                 'first_name' => 'Arnel',
                 'middle_name' => 'C.',
                 'last_name' => 'Aguinaldo',
                 'email' => 'acaguinaldo@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Malobago',
                 'city' => 'Manito',
                 'province' => 'Albay',
                 'zip' => '4514',
                 'role_id' => '7',
                 'program_id' => '3',
                 'status_id' => '1',
            ], 
            [
                 'first_name' => 'Rodolfo',
                 'middle_name' => 'A.',
                 'last_name' => 'Amaro',
                 'email' => 'raamaro@gmail.com',
                 'password' => Hash::make('beneficiary123'),
                 'phone' => '639923034018',
                 'barangay' => 'Buyo',
                 'city' => 'Manito',
                 'province' => 'Albay',
                 'zip' => '4514',
                 'role_id' => '7',
                 'program_id' => '3',
                 'status_id' => '1',
            ],
            //binhi Beneficiary 
            [
                'first_name' => 'Michelle',
                'middle_name' => 'T.',
                'last_name' => 'Vera',
                'email' => 'jorizaoliva@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Ilawod',
                'city' => 'Camalig',
                'province' => 'Albay',
                'zip' => '4502',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'John',
                'middle_name' => 'T.',
                'last_name' => 'Mapa',
                'email' => 'jtmapa@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'San Isidro',
                'city' => 'Malilipot',
                'province' => 'Albay',
                'zip' => '4510',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Jennifer',
                'middle_name' => 'D.',
                'last_name' => 'Calderon',
                'email' => 'jdcalderon@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'San Jose',
                'city' => 'Malilipot',
                'province' => 'Albay',
                'zip' => '4510',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Maricel',
                'middle_name' => 'E.',
                'last_name' => 'Ibarra',
                'email' => 'meibarra@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Sua-igot',
                'city' => 'Tabaco',
                'province' => 'Albay',
                'zip' => '4511',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Maria',
                'middle_name' => 'P.',
                'last_name' => 'Mirasol',
                'email' => 'mpmirasol@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Calbayog',
                'city' => 'Malilipot',
                'province' => 'Albay',
                'zip' => '4510',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Lourdes',
                'middle_name' => 'A.',
                'last_name' => 'Dorado',
                'email' => 'ladorado@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'San Roque',
                'city' => 'Malilipot',
                'province' => 'Albay',
                'zip' => '4510',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Richard',
                'middle_name' => 'D.',
                'last_name' => 'Roque',
                'email' => 'rdroque@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Sta Cruz',
                'city' => 'Malilipot',
                'province' => 'Albay',
                'zip' => '4510',
                'role_id' => '7',
                'program_id' => '1',
                'status_id' => '1',
            ], 
            [
                'first_name' => 'Richard',
                'middle_name' => 'D.',
                'last_name' => 'Roque',
                'email' => 'rdroque2@gmail.com',
                'password' => Hash::make('beneficiary123'),
                'phone' => '639923034018',
                'barangay' => 'Sta Cruz',
                'city' => 'Malilipot',
                'province' => 'Albay',
                'zip' => '4510',
                'role_id' => '7',
                'program_id' => '3',
                'status_id' => '1',
            ],

        ]);
    }
}
