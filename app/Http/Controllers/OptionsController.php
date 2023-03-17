<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OptionsController extends Controller{
    public static function getOptions(){
        $options = DB::table('options')
            ->get(['key','value']);

        $optionList = array();

        foreach ($options as $option) {
            $optionList[$option->key] = $option->value;
        }


        return $optionList;
    }
}
