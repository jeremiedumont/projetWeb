<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopInfoController extends Controller
{
    public function index($param){
    	$s = DB::select("select * from shop where siret='$param'");
    	$d = DB::select("select * from dish where idmenu IN (select idm from menu where idshop='$param')");
    	$i = DB::select("(select * from image where ids='$param')");
    	$m = DB::select("select * from menu where idshop='$param'");
    	$h = DB::select("select * from openingschedule,openingtime where idshop='$param' and idhours=idh");
    	//var_dump($s[0]);
    	//echo ''.$s->name.' '.$s->city.' '.$s->siret;
    	return view('shop', ['paramShop'=>$s[0], 'paramImages'=>$i, 'paramMenus'=>$m, 'paramDishes'=>$d, 'paramHours'=>$h]);
    }
}
