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
                'value' => 'favicon.ico', //Por mis narices que esto tendra que llamarse siempre asi, que si no el VUE Head dice que me vaya a tomar por culo de una forma increible
                'key' => 'favicon',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            3 => 
            array (
                'id' => 4,
                'value' => 'Título de la web',
                'key' => 'web_title',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            4 => 
            array (
                'id' => 5,
                'value' => 'MI TITULO DE LA WEB',
                'key' => 'home_title',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            5 => 
            array (
                'id' => 6,
                'value' => 'MI SUBTITULO DE WEB, aqui puede ir una descripción super larga, como esta. Es que poner un lorem ipsum está muy visto ya ¿No?',
                'key' => 'home_subtitle',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            7 => 
            array (
                'id' => 7,
                'value' => 'Descubrir Más',
                'key' => 'home_btnText',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
        ));
    }
}
