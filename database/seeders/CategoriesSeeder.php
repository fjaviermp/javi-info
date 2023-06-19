<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder{
    public function run(){
        //Estas son las categorias principales o "padres"
        DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hermandad',
                'slug' => 'hermandad',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:01',
                'updated_at' => '2023-05-30 13:51:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sede Canónica',
                'slug' => 'sede-canonica',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:02',
                'updated_at' => '2023-05-30 13:51:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Historia',
                'slug' => 'historia',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:03',
                'updated_at' => '2023-05-30 13:51:03',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Titulares',
                'slug' => 'titulares',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:04',
                'updated_at' => '2023-05-30 13:51:04',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cofradía',
                'slug' => 'cofradia',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:05',
                'updated_at' => '2023-05-30 13:51:05',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Cultos',
                'slug' => 'cultos',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:06',
                'updated_at' => '2023-05-30 13:51:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Formación',
                'slug' => 'formacion',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:07',
                'updated_at' => '2023-05-30 13:51:07',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Caridad',
                'slug' => 'caridad',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:08',
                'updated_at' => '2023-05-30 13:51:08',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Únete',
                'slug' => 'unete',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-05-30 13:51:07',
                'updated_at' => '2023-05-30 13:51:07',
            ),
        ));
        //Estas son las categorias secundarias o "hijas"
        DB::table('subcategories')->insert(array(
            0 => 
            array (
                'id' => 1,
                'parent_id' => 2,
                'name' => 'Consiliario',
                'slug' => 'consiliario',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:01',
                'updated_at' => '2023-06-19 09:56:01',
            ), 
            1 => 
            array (
                'id' => 2,
                'parent_id' => 3,
                'name' => 'Salida Extraordinaria 4 de Junio',
                'slug' => 'salida-extraordinaria-4-junio',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:02',
                'updated_at' => '2023-06-19 09:56:02',
            ), 
            2 => 
            array (
                'id' => 3,
                'parent_id' => 5,
                'name' => 'Patrimonio',
                'slug' => 'patrimonio',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:03',
                'updated_at' => '2023-06-19 09:56:03',
            ), 
            3 => 
            array (
                'id' => 4,
                'parent_id' => 5,
                'name' => 'Papeletas de sitio',
                'slug' => 'papeletas-sitio',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:04',
                'updated_at' => '2023-06-19 09:56:04',
            ), 
            4 => 
            array (
                'id' => 5,
                'parent_id' => 6,
                'name' => 'Septenario',
                'slug' => 'septenario',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:05',
                'updated_at' => '2023-06-19 09:56:05',
            ), 
            5 => 
            array (
                'id' => 6,
                'parent_id' => 6,
                'name' => 'Viernes de Dolores',
                'slug' => 'viernes-de-dolores',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:06',
                'updated_at' => '2023-06-19 09:56:06',
            ), 
            6 => 
            array (
                'id' => 7,
                'parent_id' => 6,
                'name' => 'Corpus Christi',
                'slug' => 'corpus-christi',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:07',
                'updated_at' => '2023-06-19 09:56:07',
            ), 
            7 => 
            array (
                'id' => 8,
                'parent_id' => 6,
                'name' => 'Besamanos',
                'slug' => 'besamanos',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:08',
                'updated_at' => '2023-06-19 09:56:08',
            ), 
            8 => 
            array (
                'id' => 9,
                'parent_id' => 6,
                'name' => 'Procesión de Enfermos',
                'slug' => 'procesion-enfermos',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:09',
                'updated_at' => '2023-06-19 09:56:09',
            ), 
            9 => 
            array (
                'id' => 10,
                'parent_id' => 6,
                'name' => 'Festividad de San Juan',
                'slug' => 'festividad-san-juan',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:10',
                'updated_at' => '2023-06-19 09:56:10',
            ), 
            10 => 
            array (
                'id' => 11,
                'parent_id' => 7,
                'name' => 'Retiros',
                'slug' => 'retiros',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:11',
                'updated_at' => '2023-06-19 09:56:11',
            ), 
            11 => 
            array (
                'id' => 12,
                'parent_id' => 8,
                'name' => 'Reparto de alimentos',
                'slug' => 'reparto-alimentos',
                'desc' => '',
                'active' => 1,
                'main' => 1,
                'created_at' => '2023-06-19 09:56:12',
                'updated_at' => '2023-06-19 09:56:12',
            ), 
        ));
    }
}
