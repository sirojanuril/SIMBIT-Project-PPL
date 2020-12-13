<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Transaksi;
use App\Metode;
use App\Pesanan;
use App\User;
use Auth;
use DB;

class TransaksiController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function supplier()
    {
    	$transaksi = Transaksi::all();
    	return view('transaksi.supplier', compact('transaksi'));
    }

    public function data_penjualan(Request $request)
    {

    	// $pengguna = Pengguna::where('pengguna_id',$id)->firstOrFail();
    	// where('id', Auth::user()->id)->first()

    	$pengguna = Pengguna::where('id', Auth::user()->id)->first();
        // $metode = Metode::all();
    	// $transaksi = Transaksi::where('metode_id', $metode->id)->first();

	    $transaksi = new Transaksi();
        // $transaksi->metode_id       = $metode->id;
	    $transaksi->stok_kedelai 	= $request->stok_kedelai;
	    $transaksi->stok_ragi 		= $request->stok_ragi;
	    $transaksi->harga_kedelai 	= $request->harga_kedelai;
	    $transaksi->harga_ragi 		= $request->harga_ragi;
	    // $transaksi->bni 			= $request->bni;
	    // $metode->bri 			= $request->bri;
	    // $metode->bca 			= $request->bca;
	    // $metode->mandiri 		= $request->mandiri;
	    // $metode->btpn 			= $request->btpn;
	    // $metode->ovo 			= $request->ovo;
	    // $metode->gopay 			= $request->gopay;
	    // $metode->dana 			= $request->bni;


	    $pengguna->transaksi()->save($transaksi);

        return view('transaksi.supplier', compact('transaksi'));
    }

    // public function metode_pembayaran()
    // {
    //     return 'sukses';
    // }

    public function data_penjualan_supplier()
    {
        $transaksi = Transaksi::where('pengguna_id', Auth::user()->id)->get();
    	return view('transaksi.data_penjualan', compact('transaksi'));
    }

    public function ubah_data_penjualan($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.ubah_data', compact('transaksi'));
    }

    public function data_update(Request $request, $id)
    {
        // DB::table('transaksi')->where('id',$request->id)->update([
        //     'stok_kedelai'       => $request->stok_kedelai,
        //     'stok_ragi'          => $request->stok_ragi,
        //     'harga_kedelai'      => $request->harga_kedelai,
        //     'harga_ragi'         => $request->harga_ragi,
        // ]);

        // $transaksi = Transaksi::find($id);

        // $metode = Metode::where('id', $id)->first();

        $transaksi = Transaksi::where('id', $request->id)->first();
        // $transaksi->metode_id       = $metode->id;
        $transaksi->stok_kedelai    = $request->stok_kedelai;
        $transaksi->stok_ragi       = $request->stok_ragi;
        $transaksi->harga_kedelai   = $request->harga_kedelai;
        $transaksi->harga_ragi      = $request->harga_ragi;
        // $transaksi->bni             = $request->bni;
        
        
        $transaksi->update();

        return redirect('/transaksi/data_penjualan');

    }

    public function pesanan()
    {
        $transaksi = Transaksi::where('pengguna_id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('transaksi_id', $transaksi->id)->latest()->get();

        return view('transaksi.pesanan', compact('pesanan'));
    }

    public function update_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        return view('transaksi.update_pesanan', compact('pesanan'));
    }

    public function update_pesanan_baru(Request $request, $id)
    {
        DB::table('pesanan')->where('id',$request->id)->update([
            'status'           => $request->status,
        ]);

        $pesanan = Pesanan::find($id);

        return redirect('/transaksi/pesanan');
    }




    // MITRA

    public function mitra()
    {

    	$supplier = Transaksi::latest()->paginate(10);
    	return view('transaksi.mitra', compact('supplier'));
    }

    public function transaksi($id)
    {
    	$transaksi = Transaksi::find($id);
    	return view('transaksi.beli', compact('transaksi'));
    }

    public function riwayat()
    {
    	$transaksi = Transaksi::latest()->paginate(10);
    	$pesanan = Pesanan::latest()->paginate(10);

    	return view('transaksi.riwayat', compact('pesanan', 'transaksi'));
    }

    public function beli(Request $request, $id)
    {

	    $transaksi = Transaksi::where('id', $id)->first();
        $user      = User::where('id', Auth::user()->id)->first();

    	$pesanan                   = new Pesanan();
    	$pesanan->transaksi_id	   = $transaksi->id;
        $pesanan->user_id          = $user->id; 
	    $pesanan->total_pembelian  = ($transaksi->harga_kedelai*$request->kedelai_beli) + ($transaksi->harga_ragi*$request->ragi_beli);
	    $pesanan->status 		   = "Belum Diverifikasi";

        if ($request->kedelai_beli > $transaksi->stok_kedelai) {
            return redirect('transaksi/beli/'.$id);
        }elseif ($pesanan->kedelai_beli  = $request->kedelai_beli) {
            
            $transaksi->stok_kedelai = $transaksi->stok_kedelai - $pesanan->kedelai_beli;
            $transaksi->update();
        }

        if ($request->ragi_beli > $transaksi->stok_ragi) {
            return redirect('transaksi/beli/'.$id);
        }elseif ($pesanan->ragi_beli = $request->ragi_beli) {
            
            $transaksi->stok_ragi = $transaksi->stok_ragi - $pesanan->ragi_beli;
            $transaksi->update();   
        }

	    $transaksi->pesanan()->save($pesanan);

    	return redirect('/transaksi/riwayat');
    }

    public function upload_bukti($id)
    {
        $pesanan = Pesanan::find($id);
        return view('transaksi.upload_bukti', compact('pesanan'));
    }

    public function bukti(Request $request, $id)
    {
        
        $pesanan = Pesanan::where('id', $request->id)->first();
        if ($request->hasfile('bukti_pembayaran')) {
            $gambar         = $request->file('bukti_pembayaran');
            $new_gambar     = rand().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('upload/bukti_pembayaran/'), $new_gambar);
            $pesanan->bukti_pembayaran = $new_gambar;
        }
        
        $pesanan->update();
        
        return redirect('/transaksi/riwayat');

        // DB::table('pesanan')->where('id', $request->id)->update([
        //     if ($request->hasfile('bukti_pembayaran')) {
        //         $gambar = $request->file('bukti_pembayaran');,
        //         $new_gambar = rand().'.'.$gambar->getClientOriginalExtension();
        //         $gambar->move(public_path('upload/bukti_pembayaran/'), $new_gambar);
        //         'bukti_pembayaran' => $request->$new_gambar;
        //     }
        //     // 'bukti_pembayaran'           => $request->bukti_pembayaran,
        // ]);
    }
}
