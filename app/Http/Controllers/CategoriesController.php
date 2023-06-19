<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CategoriesController extends Controller{
    public static function index(){
        $categories = DB::table('categories')->get();
        return $categories;
    }

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

    public static function get($id){
        $category = DB::table('categories')->where('id', $id)->orderBy('created_at', 'desc')->get();
        return $category;
    }

    public static function update(Request $request){
        $slug = Str::slug($request->name, "-");

        DB::table('categories')->where('id', $request->id)->update([
            "name" => $request->name,
            "slug" => $slug,
            "desc" => $request->desc,
            "active" => $request->checked,
            "main" => $request->main,
            "updated_at" => Carbon::now(),
        ]);

        return to_route('categories.show');
    }

    public static function create(Request $request){
        $slug = Str::slug($request->name, "-");
        $now =  Carbon::now();
        $desc = $request->desc;

        if ($desc == NULL)
            $desc = "";

        DB::table('categories')->insert([
            "name" => $request->name,
            "slug" => $slug,
            "desc" => $desc,
            "active" => $request->checked,
            "main" => $request->main,
            "created_at" => $now,
            "updated_at" => $now
        ]);

        return to_route('categories.show');
    }

    public static function delete(Request $request){
        DB::table('categories')->where("id", $request->id)->delete();
    }

    public static function search(Request $request){
        $search = DB::table('categories')->where('name', $request->search)->get();
        return $search;
    }
}