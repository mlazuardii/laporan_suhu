<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('status')){
			$users = DB::table('users')->get();

			return view ('admin',['users' => $users]);
		}else{
			echo 'Login dulu';
		}
    }
}
