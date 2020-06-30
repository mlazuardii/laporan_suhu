<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use PDF;

class AdminController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('username')){
			$nama = $request->session()->get('username');
			$pengecekan = DB::table('pengecekan')->get();
			return view ('admin',['nama' => $nama,'pengecekan'=>$pengecekan]);
		}else{
			echo 'Login dulu';
		}
	}
	public function input(Request $request){
		DB::table('pengecekan')->insert([
			'tanggal' => $request->tanggal,
			'suhu' => $request->suhu,
			'humidity' => $request->humidity,
			'nama_petugas' => $request->session()->get('username'),
			]);
			return redirect('/admin');
	}
	public function cetak(Request $request){
		//$pengecekan = DB::table('pengecekan')->get();
		$nama = $request->session()->get('username');
		return view('cetak',['nama' => $nama]);
	}

	public function cetakPDF(Request $request){
		//$pengecekan = DB::table('pengecekan')->where(MONTH(tanggal), 06)->get();
		//$pengecekan = DB::table('pengecekan')->get();
		//return view('cetakpdf',['pengecekan' => $pengecekan]);
		$bulan = $request->bulan;
		$tahun = $request->tahun;

		$pengecekan = DB::table("pengecekan")
		->whereMonth('tanggal', '=', $bulan)
		->whereYear('tanggal', '=', $tahun)
		->get();

		$pdf = PDF::loadview('cetakpdf',['pengecekan'=>$pengecekan]);
		return $pdf->stream();
	}
}
