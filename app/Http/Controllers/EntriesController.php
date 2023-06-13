<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EntriesController extends Controller{
    public static function index(){
        $entries = DB::table('entries')
        ->join('categories', 'categories.id', '=','entries.category')
        ->get(['entries.id', 'entries.name', 'entries.desc', 'entries.content', 'entries.author' , 'entries.category', 'categories.name AS catname', 'entries.slug', 'entries.created_at', 'entries.updated_at']);
        return $entries;
    }

    public static function store(Request $request){
        $slug = Str::slug($request->name, "-");
        $date = Carbon::now();

        DB::table('entries')->insert([
            "name" => $request->name,
            "slug" => $slug,
            "author" => Auth::user()->name,
            "desc" => $request->desc,
            "content" => $request->content,
            "category" => $request->category,
            "created_at" => $date,
            "updated_at" => $date,
        ]);
    
        return to_route('entries.show');
    }

    public static function show($id){
        $entry = DB::table('entries')->where('id', $id)->get();
        return $entry;
    }

    public static function update(Request $request){
        $slug = Str::slug($request->name, "-");

        DB::table('entries')->where('id', $request->id)->update([
            "name" => $request->name,
            "slug" => $slug,
            "author" => Auth::user()->name,
            "desc" => $request->desc,
            "content" => $request->content,
            "category" => $request->category,
            "updated_at" => Carbon::now(),
        ]);

        return to_route('entries.show');
    }

    public static function destroy(Request $request){
        DB::table('entries')->where("id", $request->id)->delete();
    }
}