<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateDBController extends Controller
{
    public function index(Request $request){
    	/*DB::table('account')->insert(['name'=>$request->input('nameInput'), 'firstName'=>$request->input('firstNameInput'), 'id'=>$request->input('idInput'), 'password'=>$request->input('passwordInput')]);
    	return redirect()->action('retrieveControllerAccounts@index');*/
    }
}
