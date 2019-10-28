<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UpdateAccountController extends Controller
{
    public function index(Request $req){
      DB::table('users')->where('id', Auth::user()->id)->update(
        ['name'=>$req->input('inputName'), 'firstname'=>$req->input('inputFirstName'), 'mobile'=>$req->input('inputMobile'),
         'addr'=>$req->input('inputAddr'), 'postalcode'=>$req->input('inputPostalCode'), 'city'=>$req->input('inputCity')]);
     $user = Auth::user();
     $req = "select * from shop where idm='$user->id'";
   	 $shops = DB::select($req);
   	 return view('myAccount', ['user'=>$user, 'shops'=>$shops]);
    }
}
