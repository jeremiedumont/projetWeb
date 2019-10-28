<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;

class UploadProfilePictureController extends Controller
{

    public function index(Request $req){
     //fichier correctement uploadé
     if (!isset($_FILES['uploadpp']) OR $_FILES['uploadpp']['error'] > 0) return FALSE;
     $ext = substr(strrchr($_FILES['uploadpp']['name'],'.'),1);
     //Déplacement
     $old_image_path = DB::table('users')->where('id', Auth::user()->id)->get('profilepicture');
     $image_path = '/images/profilepictures/'.basename($_FILES['uploadpp']['tmp_name']).'.'.$ext;
     move_uploaded_file($_FILES['uploadpp']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] .$image_path);
     DB::table('users')->where('id', Auth::user()->id)->update(['profilepicture' => $image_path]);

     /*if(File::exists($old_image_path)) {
          File::delete($old_image_path);
     }*/
     $user = Auth::user();
     $req = "select * from shop where idm='$user->id'";
   	 $shops = DB::select($req);
   	 return view('myAccount', ['user'=>$user, 'shops'=>$shops]);
   }
}
