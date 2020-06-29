<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use PDF;

class AdminController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('status')){
			return view ('admin');
		}else{
			echo 'Login dulu';
		}
	}
	public function input(Request $request){
		DB::table('pengecekan')->insert([
			'tanggal' => $request->tanggal,
			'suhu' => $request->suhu,
			'humidity' => $request->humidity,
			'nama_petugas' => $request->nama_petugas,
			]);
			return redirect('/admin');
	}
	public function cetak(Request $request){
		$pengecekan = DB::table('pengecekan')->get();
		return view('cetak',['pengecekan' => $pengecekan]);
	}

	public function cetakPDF(Request $request){
		$pengecekan = DB::table('pengecekan')->get();
		//return view('cetakpdf',['pengecekan' => $pengecekan]);

		$pdf = PDF::loadview('cetakpdf',['pengecekan'=>$pengecekan]);
		return $pdf->stream();
	}
}
