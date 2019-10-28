<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetMenuController extends Controller
{
    public function index($param){
      return view('addDish',['menu'=>$param]);
    }
}
