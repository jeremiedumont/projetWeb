<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteAccountController extends Controller
{
    public function index()
    {
      $id = Auth::id();
      Auth::logout();
      DB::table('shop')->where('idm',$id)->delete();
      DB::table('users')->where('id', $id)->delete();
      $shops = DB::select("select siret, name, lat, long, city from shop");
      return view('welcome', ['shops'=>$shops]);
    }

}
