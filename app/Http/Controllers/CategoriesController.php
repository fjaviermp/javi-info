<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller{
    public static function get(Request $request){
        if ($request->limit) 
            $categories = DB::table('categories')->offset(0)->limit($request->limit)->get();
        else
            $categories = DB::table('categories')->get();
        
        return response()->json($categories);
    }
}