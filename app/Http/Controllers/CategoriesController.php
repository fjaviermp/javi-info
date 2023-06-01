<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller{
    public static function index(){
        $categories = DB::table('categories')->get();
        return $categories;
    }

    public static function get($id){
        $category = DB::table('categories')->where('id', $id)->get();
        return $category;
    }
}