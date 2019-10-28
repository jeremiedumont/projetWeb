<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class retrieveControllerAccounts extends Controller
{
    public function index(){
    	/*$users = DB::select('select * from account');
    	//var_dump($users);
    	return view('welcome')->with('users', $users);*/
    }
}
