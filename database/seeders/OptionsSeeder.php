<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder{
    public function run(){
        DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'value' => 'bg.webp',
                'key' => 'home_image',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            1 => 
            array (
                'id' => 2,
                'value' => 'logo.png',
                'key' => 'logo',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            2 => 
            array (
                'id' => 3,
                'value' => 'favicon.png',
                'key' => 'favicon',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            3 => 
            array (
                'id' => 4,
                'value' => 'Título de la web',
                'key' => 'home_title',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            8 => 
            array (
                'id' => 9,
                'value' => 'SUBTÍTULO DE LA WEB',
                'key' => 'home_subtitle',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
        ));
    }
}
