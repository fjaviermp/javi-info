<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    public static function get(Request $request){
        if ($request->limit) 
            $users = DB::table('users')->offset(0)->limit($request->limit)->get();
        else
            $users = DB::table('users')->get();
        
        return response()->json($users);
    }
}
