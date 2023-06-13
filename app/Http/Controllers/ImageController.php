<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class ImageController extends Controller{
    public static function store(Request $request){   
            $slug = Str::slug($request->image->getClientOriginalName(), '-');
            $slug = str_replace($request->image->getClientOriginalExtension(), "", $slug);
            $name = $slug . "." . $request->image->getClientOriginalExtension();
            $folder = public_path('img/assets/');

            $request->image->move($folder, $name);
            $imagePath = $folder.$name;

            return response([
                'imgName' => $name,
            ]);
    }
}
