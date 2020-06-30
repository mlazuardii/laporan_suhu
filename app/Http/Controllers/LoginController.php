<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view ('login');
    }
    public function prosesLogin(Request $request){

        $username=$request->username;
        $password=$request->pass;

        $user = DB::table('users')
        ->where('username',$username)
        ->first();

        if(Hash::check($user->password,Hash::make($password))){
            $request->session()->put('username',$user->nama_petugas);
            return redirect('/admin');
        }else{
            echo "Password salah";}

    }
    public function logout(Request $request){
        $request->session()->forget('username');
        return redirect('/');
    }
}
