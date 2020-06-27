<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('status')){
			return view ('admin');
		}else{
			echo 'Login dulu';
		}
    }
}
