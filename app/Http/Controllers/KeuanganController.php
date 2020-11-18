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

    	$keuangan = array(
	        'bahan_baku' 				=> $request->bahan_baku,
	    	'biaya_tambahan' 			=> $request->biaya_tambahan,
	    	'jumlah_tempe'				=> $request->jumlah_tempe,
	    	'biaya_produksi'			=> $request->bahan_baku + $request->biaya_tambahan,
	    	'hasil_penjualan'			=> $request->jumlah_tempe * 1000,
	    	'hasil_pendapatan'			=> ($request->jumlah_tempe * 1000) - ($request->bahan_baku + $request->biaya_tambahan),
	    	'tanggal'					=> $tanggal,
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

        // $tanggal = date("Y-m-d");
        // $keuangan = array(
        //     'bahan_baku'                => $request->bahan_baku,
        //     'biaya_tambahan'            => $request->biaya_tambahan,
        //     'jumlah_tempe'              => $request->jumlah_tempe,
        //     'biaya_produksi'            => $request->bahan_baku + $request->biaya_tambahan,
        //     'hasil_penjualan'           => $request->jumlah_tempe * 1000,
        //     'hasil_pendapatan'          => ($request->jumlah_tempe * 1000) - ($request->bahan_baku + $request->biaya_tambahan),
        //     'tanggal'                   => $tanggal,
        // );

        // $keuangan = Keuangan::find($id);
        // $keuangan->update($request->all());

        // return view('keuangan.hasil', compact('keuangan'));

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
}
