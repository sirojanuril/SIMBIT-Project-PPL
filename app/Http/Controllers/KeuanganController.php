<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use \App\Keuangan;
use Carbon;
use DB;

class KeuanganController extends Controller
{

    public function index()
    {	
    	$keuangan = Keuangan::all();
        return view('keuangan.hitung', compact('keuangan'));
    }


    public function hitung(Request $request)
    {

    	$tanggal = date("Y-m-d");
        // $jumlah_pendapatan = \DB::table('keuangan')
        // ->select([
        //     \DB::raw('count(*) as hasil_pendapatan')
        // ]);

        // $total_pendapatan = $request->hasil_pendapatan;

    	$keuangan = array(
	        'bahan_baku' 				=> $request->bahan_baku,
	    	'biaya_tambahan' 			=> $request->biaya_tambahan,
	    	'jumlah_tempe'				=> $request->jumlah_tempe,
	    	'biaya_produksi'			=> $request->bahan_baku + $request->biaya_tambahan,
	    	'hasil_penjualan'			=> $request->jumlah_tempe * 1000,
	    	'hasil_pendapatan'			=> ($request->jumlah_tempe * 1000) - ($request->bahan_baku + $request->biaya_tambahan),
	    	'tanggal'					=> $tanggal,
            // 'total_pendapatan'          => 'total_pendapatan' + $request->hasil_pendapatan,
        );
        
		$keuangan = Keuangan::create($keuangan);
        return view('keuangan.hasil', compact('keuangan'));

    }

    public function edit($id)
    {
        $keuangan = Keuangan::find($id);
    	return view('/keuangan/edit', compact('keuangan'));
    }

    public function hasil_edit(Request $request, $id)
    {

        DB::table('keuangan')->where('id',$request->id)->update([
            'bahan_baku'                => $request->bahan_baku,
            'biaya_tambahan'            => $request->biaya_tambahan,
            'jumlah_tempe'              => $request->jumlah_tempe,
            'biaya_produksi'            => $request->bahan_baku + $request->biaya_tambahan,
            'hasil_penjualan'           => $request->jumlah_tempe * 1000,
            'hasil_pendapatan'          => ($request->jumlah_tempe * 1000) - ($request->bahan_baku + $request->biaya_tambahan),
        ]);

        $keuangan = Keuangan::find($id);

        return view('keuangan.hasil', compact('keuangan'));
    }


    public function cetak_laporan($tanggal_awal, $tanggal_akhir)
    {

        $cetak_pertanggal = Keuangan::whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->get();
        return view('keuangan.laporan', compact('cetak_pertanggal'));
    }
}
