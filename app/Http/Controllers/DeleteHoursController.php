<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeleteHoursController extends Controller
{
    public function index(Request $req){
      $param=$req->input('inputHours');
      $siret = DB::table('openingschedule')->where('idhours', $param)->get('idshop');
      $siret = $siret[0]->idshop;
      DB::table('openingschedule')->where('idhours', $param)->delete();
      DB::table('openingtime')->where('idh', $param)->delete();


      $s = DB::select("select * from shop where siret='$siret'");
    	$d = DB::select("select * from dish where idmenu IN (select idm from menu where idshop='$siret')");
    	$i = DB::select("(select * from image where ids='$siret')");
    	$m = DB::select("select * from menu where idshop='$siret'");
      $h = DB::select("select * from openingschedule,openingtime where idshop='$siret' and idhours=idh");
    	//var_dump($s[0]);
    	//echo ''.$s->name.' '.$s->city.' '.$s->siret;
    	return view('shop', ['paramShop'=>$s[0], 'paramImages'=>$i, 'paramMenus'=>$m, 'paramDishes'=>$d, 'paramHours'=>$h]);
    }
}
