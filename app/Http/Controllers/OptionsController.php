<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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

    public static function indexAll() {
      return DB::table('options')->get();
    }
    public static function update(Request $request) {
      $data = $request->all();
      foreach ($data as $element) {
        DB::table('options')->where('id', $element['id'])->update([
          "value" => $element['value'],
          "updated_at" => Carbon::now(),
        ]);
      }
      return to_route('dashboard');
  }
}
