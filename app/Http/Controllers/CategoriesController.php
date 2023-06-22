<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CategoriesController extends Controller{
    public static function index($table){
        $categories = DB::table($table)->get();
        if ($table == 'subcategories')
            $categories = DB::table($table)->join('categories','subcategories.parent_id', '=', 'categories.id')->orderBy('parent_id')->get(['subcategories.id AS id', 'subcategories.name AS name', 'subcategories.desc AS desc','subcategories.active AS active', 'subcategories.main AS main', 'categories.id AS parent_id', 'categories.name AS parent_name']);
        else
            $categories = DB::table($table)->get();

        return $categories;
    }

    public static function get($id, $table){
        $category = DB::table($table)->where('id', $id)->orderBy('created_at', 'desc')->get();
        return $category;
    }

    public static function update(Request $request){
        $slug = Str::slug($request->name, "-");
        if ($request->type == "categories") {
            DB::table('categories')->where('id', $request->id)->update([
                "name" => $request->name,
                "slug" => $slug,
                "desc" => $request->desc,
                "active" => $request->checked,
                "main" => $request->main,
                "updated_at" => Carbon::now(),
            ]);
            return to_route('categories.show');
        }else{
            DB::table('subcategories')->where('id', $request->id)->update([
                "name" => $request->name,
                "parent_id" => $request->parent_id,
                "slug" => $slug,
                "desc" => $request->desc,
                "active" => $request->checked,
                "main" => $request->main,
                "updated_at" => Carbon::now(),
            ]);
            return to_route('subcategories.show');
        }
    }

    public static function create(Request $request){
        $slug = Str::slug($request->name, "-");
        $now =  Carbon::now();
        $desc = $request->desc;

        if ($desc == NULL)
            $desc = "";

        if ($request->type == "categories") {
            DB::table('categories')->insert([
                "name" => $request->name,
                "slug" => $slug,
                "desc" => $desc,
                "active" => $request->checked,
                "main" => $request->main,
                "created_at" => $now,
                "updated_at" => $now
            ]);
        }else{
            DB::table('subcategories')->insert([
                "name" => $request->name,
                "parent_id" => $request->parent_id,
                "slug" => $slug,
                "desc" => $desc,
                "active" => $request->checked,
                "main" => $request->main,
                "created_at" => $now,
                "updated_at" => $now
            ]);            
        }

        return to_route($request->type.'.show');
    }

    
    public static function delete(Request $request){
        DB::table($request->type)->where("id", $request->id)->delete();
    }

    public static function search(Request $request){
        $search = DB::table($request->type)->where('name', $request->search)->get();
        return $search;
    }
}