<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddImageController extends Controller
{
    public function index(Request $req, $param){
      //fichier correctement uploadé
      if (!isset($_FILES['addimage']) OR $_FILES['addimage']['error'] > 0) return FALSE;
      $ext = substr(strrchr($_FILES['addimage']['name'],'.'),1);
      //Déplacement
      $image_path = '/images/shopsimages/'.basename($_FILES['addimage']['tmp_name']).'.'.$ext;
      move_uploaded_file($_FILES['addimage']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] .$image_path);
      DB::table('image')->insert(['name' => basename($_FILES['addimage']['tmp_name']), 'src'=>$image_path, 'ids'=>$param]);

      /*if(File::exists($old_image_path)) {
           File::delete($old_image_path);
      }*/
      $h = DB::select("select * from openingschedule,openingtime where idshop='$param' and idhours=idh");
      $s = DB::select("select * from shop where siret='$param'");
    	$d = DB::select("select * from dish where idmenu IN (select idm from menu where idshop='$param')");
    	$i = DB::select("(select * from image where ids='$param')");
    	$m = DB::select("select * from menu where idshop='$param'");

    	//var_dump($s[0]);
    	//echo ''.$s->name.' '.$s->city.' '.$s->siret;
    	return view('shop', ['paramShop'=>$s[0], 'paramImages'=>$i, 'paramMenus'=>$m, 'paramDishes'=>$d, 'paramHours'=>$h]);
    }
}
