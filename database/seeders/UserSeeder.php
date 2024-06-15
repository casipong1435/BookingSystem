<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profiles;

use Carbon\Carbon;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $pre_users = [
            [
                'username' => 'jeffrey123',
                'role' => 1,
                'status' => 1,
                'email' => 'jeffrey_ombina@gmail.com',
                'password' => Hash::make('123456789'),
                'plain_pass' => '123456789'
            ],
            [
                'username' => 'casipong143',
                'role' => 2,
                'usesrtype' => 2,
                'status' => 1,
                'email' => 'christopher_casipong@gmail.com',
                'password' => Hash::make('123456789'),
                'plain_pass' => '123456789'
            ],
            [
                'username' => 'jibert143',
                'role' => 2,
                'usesrtype' => 2,
                'status' => 1,
                'email' => 'jibert_lozada@gmail.com',
                'password' => Hash::make('123456789'),
                'plain_pass' => '123456789'
            ],
        ];

        $pre_profile = [
            [
                'first_name' => 'jeffrey',
                'last_name'=> 'ombina',
                'username' => 'jeffrey123',
                'date_of_birth' => Carbon::parse('2000-01-01'),
                'address' => 'Maloro, tangub City',
                'zipcode' => '7214',
                'img_id' => 'sampleimg.jpg'
            ],
            [
                'first_name' => 'christopher',
                'last_name'=> 'casipong',
                'username' => 'casipong143',
                'date_of_birth' => Carbon::parse('2000-01-01'),
                'address' => 'Maloro, tangub City',
                'zipcode' => '7214',
                'img_id' => 'sampleimg.jpg'
            ],
            [
                'first_name' => 'jibert',
                'last_name'=> 'lozada',
                'username' => 'jibert143',
                'date_of_birth' => Carbon::parse('2000-01-01'),
                'address' => 'Maloro, tangub City',
                'zipcode' => '7214',
                'img_id' => 'sampleimg.jpg'
            ],
        ];

        User::insert($pre_users);
        Profiles::insert($pre_profile);

    }
}
