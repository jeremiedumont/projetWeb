<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddHoursController extends Controller
{
    public function index(Request $req, $siret){
      DB::table('openingtime')->insert(
        ['start'=>$req->input('inputStart'), 'end'=>$req->input('inputEnd')]
      );
      $id = DB::getPdo()->lastInsertId();;
      DB::table('openingschedule')->insert(
        ['day'=>$req->input('inputDay'), 'idhours'=>$id, 'idshop'=>$siret]
      );
      $h = DB::select("select * from openingschedule,openingtime where idshop='$siret' and idhours=idh");
      $s = DB::select("select * from shop where siret='$siret'");
    	$d = DB::select("select * from dish where idmenu IN (select idm from menu where idshop='$siret')");
    	$i = DB::select("(select * from image where ids='$siret')");
    	$m = DB::select("select * from menu where idshop='$siret'");

    	//var_dump($s[0]);
    	//echo ''.$s->name.' '.$s->city.' '.$s->siret;
    	return view('shop', ['paramShop'=>$s[0], 'paramImages'=>$i, 'paramMenus'=>$m, 'paramDishes'=>$d, 'paramHours'=>$h]);
    }
}
