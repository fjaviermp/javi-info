<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder{
    public function run(){
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
    }
}
