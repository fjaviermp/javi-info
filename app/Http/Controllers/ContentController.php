<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

// Controlador para sacar info mas especifica
class ContentController extends Controller{
    // Devuelve categorias, subcategorias y -entradas- en forma de menu
    public static function getAllCats(){
        $menu = [];
        $arrCats = [];

        $parent = DB::table('categories')->where('main', 1)->where('active', 1)->get();
        $child = DB::table('subcategories')->orderBy('parent_id')->where('main', 1)->where('active', 1)->get();
        
        // Formamos el menu con sus categorias
        foreach ($parent as $item) {
            // El KEY es el ID del padre
            $menu[$item->id] = (object)[
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'desc' => $item->desc,
                'active' => $item->active,
                'main' => $item->main,
                'entries' => [],
                'subcats' => [],
            ];
            array_push($arrCats, $item->id);

        }

        //Metemos subcategorias
        foreach ($child as $item) {
            if (in_array($item->parent_id, $arrCats))
                array_push($menu[$item->parent_id]->subcats, $item);
        }

        return $menu;
    }
}
