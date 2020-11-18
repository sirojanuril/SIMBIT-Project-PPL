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

    public function output_ragi(Request $request)
    {
        $request->validate([
            'kedelai'   => 'required',
        ]);

        $produksi = new Produksi;
        $produksi->kedelai  				= $request->kedelai;
    	$produksi->ragi 					= 7.5*$request->kedelai;
        $produksi->hasil_produksi 			= 1.25*$request->kedelai;
        $produksi->hasil_produksi_bungkus 	= 12*$request->kedelai;
        $produksi->kadaluarsa 				= date("Y-m-d");
        $produksi->save();
        
        return view('/produksi/output_ragi', [
            'kedelai' 					=> $produksi->kedelai,
            'hasil_ragi' 				=> $produksi->ragi, 
            'hasil_tempe' 				=> $produksi->hasil_produksi,
            'hasil_tempe_perbungkus' 	=> $produksi->hasil_produksi_bungkus,
            'kadaluarsa' 				=> $produksi->kadaluarsa
        ]);

    }
}
