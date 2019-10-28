<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordDishController extends Controller
{
    public function index(Request $req, $param){
      if (!isset($_FILES['inputPicture']) OR $_FILES['inputPicture']['error'] > 0) return FALSE;
      $ext = substr(strrchr($_FILES['inputPicture']['name'],'.'),1);

      //Déplacement
      //$old_image_path = DB::table('users')->where('id', Auth::user()->id)->get('profilepicture');
      $image_path = '/images/dishImages/'.basename($_FILES['inputPicture']['tmp_name']).'.'.$ext;
      move_uploaded_file($_FILES['inputPicture']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] .$image_path);
      //DB::table('image')->insert(['name'=>basename($_FILES['inputPicture']['tmp_name']), 'src'=>$image_path, 'ids'=>$req->input('inputSiret')]);
      //DB::table('users')->where('id', Auth::user()->id)->update(['profilepicture' => $image_path]);
      //$image_id = DB::table('image')->where('name',basename($_FILES['inputPicture']['tmp_name']))->first();
      //var_dump($image_id);


      DB::table('dish')->insert(
        ['name'=>$req->input('inputName'), 'priceunit'=>$req->input('inputPrice'), 'type'=>$req->input('inputType'), 'idmenu'=>$param, 'srcimage'=>$image_path]
      );
      $siretarray = DB::select("select idshop from menu where idm='$param'");
      $siret = $siretarray[0]->idshop;
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
