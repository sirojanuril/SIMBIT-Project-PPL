<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use \App\Produksi;
use Carbon;

class ProduksiController extends Controller
{
    public function index()
    {
    	$produksi = Produksi::all();
    	return view('produksi.index', compact('produksi'));
    }

    public function hitung_tempe()
    {
        $produksi = Produksi::all();
        return view('produksi.hitung_tempe', compact('produksi'));
    }

    public function output_ragi(Request $request)
    {
        $request->validate([
            'kedelai'   => 'required|max:10',
        ]);

        $produksi = new Produksi;
        $produksi->kedelai  				= $request->kedelai;
    	$produksi->ragi 					= 7.5*$request->kedelai;
        $produksi->hasil_produksi 			= 1.25*$request->kedelai;
        $produksi->hasil_produksi_bungkus 	= 12*$request->kedelai;
        $produksi->kadaluarsa 				= date("Y-m-d");

        if ($request->kedelai == 0) {
            return redirect('/produksi')->with('danger', 'Hitung kedelai tidak boleh 0');
        }

        $produksi->save();
        
        return view('/produksi/output_ragi', [
            'kedelai' 					=> $produksi->kedelai,
            'hasil_ragi' 				=> $produksi->ragi, 
            'hasil_tempe' 				=> $produksi->hasil_produksi,
            'hasil_tempe_perbungkus' 	=> $produksi->hasil_produksi_bungkus,
            'kadaluarsa' 				=> $produksi->kadaluarsa
        ]);

    }

    public function hasil_tempe(Request $request)
    {
        $request->validate([
            'hasil_produksi'   => 'required|max:10',
        ],[
            'hasil_produksi.required' => 'hitung tempe harus diisi',
            'hasil_produksi.max'      => 'hitung tempe tidak boleh melebihi 10 karakter'
        ]);

        $produksi = new Produksi;
        $produksi->hasil_produksi           = $request->hasil_produksi;
        $produksi->kedelai                  = 0.8*$request->hasil_produksi;
        $produksi->ragi                     = 6*$request->hasil_produksi;
        $produksi->hasil_produksi_bungkus   = 10*$request->hasil_produksi; //10 atau 12
        $produksi->kadaluarsa               = date("Y-m-d");

        if ($request->hasil_produksi == 0) {
            return redirect('/produksi/hitung_tempe')->with('danger', 'Hitung tempe tidak boleh 0');
        }

        $produksi->save();

        return view('/produksi/hasil_tempe', [
            'hasil_tempe'               => $produksi->hasil_produksi,
            'kedelai'                   => $produksi->kedelai,
            'hasil_ragi'                => $produksi->ragi, 
            'hasil_tempe_perbungkus'    => $produksi->hasil_produksi_bungkus,
            'kadaluarsa'                => $produksi->kadaluarsa
        ]);
    }

}
