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
			$pengecekan = DB::table('pengecekan')->orderBy('tanggal', 'desc')->get();
			return view ('admin',['nama' => $nama,'pengecekan'=>$pengecekan]);
		}else{
			return redirect('/');
		}
	}
	public function input(Request $request){
		DB::table('pengecekan')
		->updateOrInsert(
			['tanggal' => $request->tanggal,],
			['suhu' => $request->suhu,
			'humidity' => $request->humidity,
			'keterangan' => $request->keterangan,
			'nama_petugas' => $request->session()->get('username'),]
		);
			return redirect('/admin');
	}
	public function cetak(Request $request){
		$nama = $request->session()->get('username');
		return view('cetak',['nama' => $nama]);
	}

	public function cetakPDF(Request $request){

		$bulan = $request->bulan;
		$tahun = $request->tahun;

		$pengecekan = DB::table("pengecekan")
		->whereMonth('tanggal', '=', $bulan)
		->whereYear('tanggal', '=', $tahun)
		->get();

		$pdf = PDF::loadview('cetakpdf',['pengecekan'=>$pengecekan,'bulan'=>$bulan,'tahun'=>$tahun]);
		return $pdf->stream();
	}
}
