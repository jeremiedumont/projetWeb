<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteDishController extends Controller
{
  public function index(Request $req){
    $param = $req->input('inputDish');
    $menuarray = DB::table('dish')->where('idd', $param)->get('idmenu');
    $menu = $menuarray[0]->idmenu;
    $shoparray = DB::table('menu')->where('idm', $menu)->get('idshop');
    $shop = $shoparray[0]->idshop;
    DB::table('dish')->where('idd', $param)->delete();

    $s = DB::select("select * from shop where siret='$shop'");
    $d = DB::select("select * from dish where idmenu IN (select idm from menu where idshop='$shop')");
    $i = DB::select("(select * from image where ids='$shop')");
    $m = DB::select("select * from menu where idshop='$shop'");
    $h = DB::select("select * from openingschedule,openingtime where idshop='$shop' and idhours=idh");

    //var_dump($s[0]);
    //echo ''.$s->name.' '.$s->city.' '.$s->siret;
    return view('shop', ['paramShop'=>$s[0], 'paramImages'=>$i, 'paramMenus'=>$m, 'paramDishes'=>$d, 'paramHours'=>$h]);
  }
}
