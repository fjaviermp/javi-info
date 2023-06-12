<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class ImageController extends Controller{
    public static function store(Request $request){
        if($request->file('img')){
            $slug = Str::slug($request->name, '-');

            $folder = public_path('img/assets/');

            foreach($request->file('img') as $img) {      
                $imgName = $slug . time() . '.' . $img->getClientOriginalExtension();            
                $img->move($folder, $imgName);   
            }

            return response()->json([
                'folder' => $folder, 
                'location' => $folder.$imgName
            ]);
        }
    }
}
