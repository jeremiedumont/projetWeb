<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index(){
    	$user = Auth::user();
      $req = "select * from shop where idm='$user->id'";
    	$shops = DB::select($req);
    	return view('myAccount', ['user'=>$user, 'shops'=>$shops]);
    }
}
