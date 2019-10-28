<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModifyPersInfoController extends Controller
{
    public function index(){
      return view("modifyPersInfo", ['user'=>Auth::user()]);
    }
}
