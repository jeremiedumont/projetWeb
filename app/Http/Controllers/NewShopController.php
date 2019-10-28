<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;

class NewShopController extends Controller
{
  public function index(Request $req){
    //fichier correctement uploadé
      if (!isset($_FILES['inputPicture']) OR $_FILES['inputPicture']['error'] > 0) return FALSE;
      $ext = substr(strrchr($_FILES['inputPicture']['name'],'.'),1);

      $user = Auth::user();
      $request = "select * from shop where idm='$user->id'";
      $shops = DB::select($request);
      $state = ($request=="1");

      DB::table('shop')->insert(
        ['name'=>$req->input('inputName'), 'siret'=>$req->input('inputSiret'), 'phone'=>$req->input('inputPhone'),
         'addr'=>$req->input('inputAddr'), 'postalcode'=>$req->input('inputPostalCode'), 'city'=>$req->input('inputCity'), 'openingstate'=>$state, 'idm'=>$user->id, 'lat'=>$req->input('inputLatitude'),'long'=>$req->input('inputLongitude')]);

      //GPS Coordinates
      //$fulladdr = $req->input('inputAddr')." ".$req->input('inputPostalCode')." ".$req->input('inputCity');
      //$this->getXmlCoordsFromAdress($fulladdr, $req->input('inputSiret'));
      //Déplacement
      //$old_image_path = DB::table('users')->where('id', Auth::user()->id)->get('profilepicture');
      $image_path = '/images/profilepictures/'.basename($_FILES['inputPicture']['tmp_name']).'.'.$ext;
      move_uploaded_file($_FILES['inputPicture']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] .$image_path);
      //DB::table('image')->insert(['name'=>basename($_FILES['inputPicture']['tmp_name']), 'src'=>$image_path, 'ids'=>$req->input('inputSiret')]);
      //DB::table('users')->where('id', Auth::user()->id)->update(['profilepicture' => $image_path]);
      //$image_id = DB::table('image')->where('name',basename($_FILES['inputPicture']['tmp_name']))->first();
      //var_dump($image_id);
      DB::table('shop')->where('siret', $req->input('inputSiret'))->update(['profilepicture'=>$image_path]);

         return view('myAccount', ['user'=>$user, 'shops'=>$shops]);
  }

  public function getXmlCoordsFromAdress($address, $siret)
  {
    $coords=array();
    $request_url="https://maps.googleapis.com/maps/api/geocode/xml?address={$address}&key=AIzaSyBXj2gsxY43EB1xdBEQ8nX26G1f7YwVjSQ";
    // ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
    //$request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
    $xml = simplexml_load_file($request_url) or die("url not loading");
    print_r($xml);
    $coords['lat']=$coords['lon']='';
    $coords['status'] = $xml->status ;
    if($coords['status']=='OK')
    {
     $coords['lat'] = $xml->result->geometry->location->lat ;
     $coords['lon'] = $xml->result->geometry->location->lng ;
     DB::table('shop')->where('siret', siret)->update(['lat'=>$coords['lat'], 'long'=>$coords['lon']]);
    }
    return $coords;

    $address = 'avenida+gustavo+paiva,maceio,alagoas,brasil';


  }
}
