<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder{
    public function run(){
        DB::table('options')->insert(array (
            /* Imagen del Home */
            0 => 
            array (
                'id' => 1,
                'value' => 'bg.webp',
                'key' => 'home_image',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            /* El logo de la web */
            1 => 
            array (
                'id' => 2,
                'value' => 'logo.png',
                'key' => 'logo',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            /* Favicon, sobran palabras*/
            2 => 
            array (
                'id' => 3,
                'value' => 'favicon.ico', //Esto tendra que llamarse siempre asi, que si no el VUE Head dice que me vaya a tomar por culo de una forma increible
                'key' => 'favicon',
                'type' => 'file',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            /* Como se llama la web */
            3 => 
            array (
                'id' => 4,
                'value' => 'Título de la web',
                'key' => 'web_title',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            /* Titulos <h1> y descripcion delante de la foto en el Home */
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
            /* Este es el boton de debajo de la descripcion larga en el Home */
            7 => 
            array (
                'id' => 7,
                'value' => 'Descubrir Más',
                'key' => 'home_btnText',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            8 => 
            array (
                'id' => 8,
                'value' => '/login',
                'key' => 'home_btnUrl',
                'type' => 'text',
                'created_at' => '2023-03-16 18:05:00',
                'updated_at' => '2023-03-16 18:05:00',
            ),
            /* Esta es la parte de opciones para las tres tarjetas con iconos */
                //Primer tarjeta
                    9 => 
                    array (
                        'id' => 9,
                        'value' => 'fas fa-globe',
                        'key' => 'home_btn1_icon',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                    10 => 
                    array (
                        'id' => 10,
                        'value' => 'Global Reach',
                        'key' => 'home_btn1_title',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                    11 => 
                    array (
                        'id' => 11,
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur, tortor ipsum aliquam purus.',
                        'key' => 'home_btn1_text',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                //Segundo tarjeta
                    12 => 
                    array (
                        'id' => 12,
                        'value' => 'fas fa-clock',
                        'key' => 'home_btn2_icon',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                    13 => 
                    array (
                        'id' => 13,
                        'value' => '24/7 Support',
                        'key' => 'home_btn2_title',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                    14 => 
                    array (
                        'id' => 14,
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur, tortor ipsum aliquam purus.',
                        'key' => 'home_btn2_text',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                //Tercer tarjeta
                    15 => 
                    array (
                        'id' => 15,
                        'value' => 'fas fa-heart',
                        'key' => 'home_btn3_icon',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                    16 => 
                    array (
                        'id' => 16,
                        'value' => 'Customer Love',
                        'key' => 'home_btn3_title',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
                    17 => 
                    array (
                        'id' => 17,
                        'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur, tortor ipsum aliquam purus.',
                        'key' => 'home_btn3_text',
                        'type' => 'text',
                        'created_at' => '2023-03-16 18:05:00',
                        'updated_at' => '2023-03-16 18:05:00',
                    ),
        ));
    }
}
