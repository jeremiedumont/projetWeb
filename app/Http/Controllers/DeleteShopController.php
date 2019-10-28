<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteShopController extends Controller
{
    public function index(Request $req){
      $siret = $req->input('inputSiret');
      $menus = DB::select("select idm from menu where idshop='$siret'");
      $hours = DB::select("select idhours from openingschedule where idshop='$siret'");
      $menuarray = [];
      foreach ($menus as $m) {
        array_push($menuarray,$m->idm);
      }
      $hoursarray = [];
      foreach ($hours as $h) {
        array_push($hoursarray,$h->idhours);
      }

      DB::table('dish')->whereIn('idmenu',$menuarray)->delete();
      DB::table('menu')->where('idshop',$siret)->delete();
      DB::table('openingschedule')->where('idshop',$siret)->delete();
      DB::table('openingtime')->whereIn('idh', $hoursarray)->delete();
      DB::table('image')->where('ids',$siret)->delete();
      DB::table('shop')->where('siret',$siret)->delete();
      $user = Auth::user();
      $req = "select * from shop where idm='$user->id'";
    	$shops = DB::select($req);
    	return view('myAccount', ['user'=>$user, 'shops'=>$shops]);
    }
}
