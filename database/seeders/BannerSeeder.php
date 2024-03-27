<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BannerSeeder extends Seeder
{
    /**
     * Banner Seeder
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'title'             => 'Your next interactive experience',
            'image'             => 'defaul_banner.png',
            'feature_title_1'        => 'Security',
            'feature_description_1'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.',
            'feature_title_2'        => 'Interactive',
            'feature_description_2'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.',
            'feature_title_3'        => 'Support',
            'feature_description_3'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.',
        ]);
    }
}
