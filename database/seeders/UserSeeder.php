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
                'email'     => 'osamasejoal@gmail.com',
                'password'  => Hash::make('12345678'),
                'gender'    => '1',
                'role'      => '1',
            ],

            //Editor
            [
                'name'      => 'Samalogy',
                'email'     => 'samalogy@mail.com',
                'password'  => Hash::make('12345678'),
                'gender'    => '1',
                'role'      => '2',
            ]
            
        ]);
    }
}
