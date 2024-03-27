<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //Admin
            [
                'name'      => 'Osama Sejoal',
                'email'     => 'osama@mail.com',
                'password'  => Hash::make('osama@mail.com'),
                'gender'    => '1',
                'role'      => '1',
            ],

            //Editor
            [
                'name'      => 'Samalogy',
                'email'     => 'samalogy@mail.com',
                'password'  => Hash::make('samalogy@mail.com'),
                'gender'    => '1',
                'role'      => '2',
            ]
            
        ]);
    }
}
