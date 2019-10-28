<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){
      $shops = DB::select("select name, city from shop");
      return view('welcome', ['shops'=>$shops]);
    }

}
