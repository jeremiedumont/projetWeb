<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyAjaxMarkersController extends Controller
{
    public function index(Request $req){
      $city = $req->query('city');
      $val = DB::select("select siret,name,lat,long from shop where city='$city'");
      $json = json_encode($val);

      return $json;
    }
}
