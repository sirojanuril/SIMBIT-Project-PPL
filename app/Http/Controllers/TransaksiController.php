<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Transaksi;
use App\Metode;
use App\Pesanan;
use App\User;
use Auth;
use Alert;
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

    	$pengguna = Pengguna::where('id', Auth::user()->id)->first();

        $request->validate([
                'foto_product'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'rekening'            => 'required|min:9|max:11',
                'harga_kedelai'       => 'required|min:3|max:10',
                'harga_ragi'          => 'required|min:3|max:10',
                'stok_kedelai'        => 'required|max:10',
                'stok_ragi'           => 'required|max:10',
            ],
            [
                'foto_product.required'        => 'Harus dalam ekstensi foto dan tidak melibihi 2 MB',
                'rekening.required'            => 'Rekening minimal 9 digit',
            ]
        );

	    $transaksi = new Transaksi();
	    $transaksi->stok_kedelai 	= $request->stok_kedelai;
	    $transaksi->stok_ragi 		= $request->stok_ragi;
	    $transaksi->harga_kedelai 	= $request->harga_kedelai;
	    $transaksi->harga_ragi 		= $request->harga_ragi;
        $transaksi->metode          = $request->metode;
        $transaksi->rekening        = $request->rekening;
        $transaksi->status          = "Buka";

        if ($request->hasfile('foto_product')) {
            $product         = $request->file('foto_product');
            $new_product     = rand().'.'.$product->getClientOriginalExtension();
            $product->move(public_path('upload/foto_product/'), $new_product);
            $transaksi->foto_product = $new_product;
        }

        if ($request->stok_kedelai == 0 && $request->stok_ragi == 0 && $request->harga_kedelai == 0 && $request->harga_ragi == 0 && $request->rekening == 0) {
            return redirect('transaksi/supplier/')->with('danger', 'Tidak boleh ada data 0');
        }elseif ($request->stok_kedelai == 0) {
            return redirect('transaksi/supplier/')->with('danger', 'Stok kedelai tidak boleh 0');
        }elseif ($request->stok_ragi == 0) {
            return redirect('transaksi/supplier/')->with('danger', 'Stok ragi tidak boleh 0');
        }elseif ($request->harga_kedelai == 0) {
            return redirect('transaksi/supplier/')->with('danger', 'Harga kedelai tidak boleh 0');
        }elseif ($request->harga_ragi == 0) {
            return redirect('transaksi/supplier/')->with('danger', 'Harga ragi tidak boleh 0');
        }elseif ($request->rekening == 0) {
            return redirect('transaksi/supplier/')->with('danger', 'Rekening tidak boleh 0');
        }
        

        $pengguna->transaksi()->save($transaksi);

        // $metode = new Metode();
        // $metode->bni             = $request->bni;
        // $metode->bri             = $request->bri;
        // $metode->bca             = $request->bca;
        // $metode->mandiri         = $request->mandiri;
        // $metode->btpn            = $request->btpn;
        // $metode->ovo             = $request->ovo;
        // $metode->gopay           = $request->gopay;
        // $metode->dana            = $request->dana;

        // $metode->save();

        // $transaksi->metode()->associate($metode);
        // $transaksi->save();

        return view('transaksi.supplier', compact('transaksi'))->with('success', 'Data Penjualan Berhasil Disimpan');
    }


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
        $product_lama    = $request->hidden_gambar;
        $product         = $request->file('foto_product');

        if ($product != '') {
            $request->validate([
                'foto_product'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'rekening'            => 'required|min:9|max:11',
                'harga_kedelai'       => 'required|min:3|max:10',
                'harga_ragi'          => 'required|min:3|max:10',
                'stok_kedelai'        => 'required|max:10',
                'stok_ragi'           => 'required|max:10',
            ],[
                'foto_product.required' => 'Harus dalam ekstensi foto dan tidak melibihi 2 MB',
            ]);

            $product_baru = $product_lama;
            $product->move(public_path('upload/foto_product'), $product_baru);

        }else{
            $request->validate([
                'rekening'            => 'required|min:9|max:11',
                'harga_kedelai'       => 'required|min:3|max:10',
                'harga_ragi'          => 'required|min:3|max:10',
                'stok_kedelai'        => 'required|max:10',
                'stok_ragi'           => 'required|max:10',
            ]);

            $product_baru = $product_lama;
            
        }

        $transaksi = Transaksi::where('id', $request->id)->first();
        $transaksi->stok_kedelai    = $request->stok_kedelai;
        $transaksi->stok_ragi       = $request->stok_ragi;
        $transaksi->harga_kedelai   = $request->harga_kedelai;
        $transaksi->harga_ragi      = $request->harga_ragi;
        $transaksi->metode          = $request->metode;
        $transaksi->rekening        = $request->rekening;
        $transaksi->status          = $request->status;
        
        if ($request->stok_kedelai == 0 && $request->stok_ragi == 0 && $request->harga_kedelai == 0 && $request->harga_ragi == 0 && $request->rekening == 0) {
            return redirect('transaksi/ubah_data/'.$id)->with('danger', 'Tidak boleh ada data 0');
        }elseif ($request->stok_kedelai == 0) {
            return redirect('transaksi/ubah_data/'.$id)->with('danger', 'Stok kedelai tidak boleh 0');
        }elseif ($request->stok_ragi == 0) {
            return redirect('transaksi/ubah_data/'.$id)->with('danger', 'Stok ragi tidak boleh 0');
        }elseif ($request->harga_kedelai == 0) {
            return redirect('transaksi/ubah_data/'.$id)->with('danger', 'Harga kedelai tidak boleh 0');
        }elseif ($request->harga_ragi == 0) {
            return redirect('transaksi/ubah_data/'.$id)->with('danger', 'Harga ragi tidak boleh 0');
        }elseif ($request->rekening == 0) {
            return redirect('transaksi/ubah_data/'.$id)->with('danger', 'Rekening tidak boleh 0');
        }
        
        $transaksi->update();


        // alert()->success('Data Berhasil Diubah', 'Success');

        return redirect('/transaksi/data_penjualan')->with('success', 'Data Penjualan Berhasil Diupdate');

    }

    public function pesanan()
    {
        $transaksi = Transaksi::where('pengguna_id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('transaksi_id', $transaksi['id'])->latest()->paginate(8);

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

        // alert()->success('Data Berhasil Diubah', 'Success');

        return redirect('/transaksi/pesanan')->with('success', 'Status pesanan berhasil diverifikasi');
    }

    public function detail_pelanggan($id)
    {
        $pelanggan = User::find($id);
        // $user = User::where('id', $pelanggan['user_id'])->first();
        return view('transaksi.detail_pelanggan', compact('pelanggan'));
    }





    // MITRA

    public function mitra()
    {

    	$supplier = Transaksi::latest()->paginate(6);
    	return view('transaksi.mitra', compact('supplier'));
    }

    public function transaksi($id)
    {
    	$transaksi = Transaksi::find($id);
    	return view('transaksi.beli', compact('transaksi'));
    }

    public function riwayat()
    {
    	$transaksi = Transaksi::latest()->paginate(7);
    	$pesanan = Pesanan::latest()->paginate(7);

    	return view('transaksi.riwayat', compact('pesanan', 'transaksi'));
    }

    public function beli(Request $request, $id)
    {

	    $transaksi = Transaksi::where('id', $id)->first();
        $user      = User::where('id', Auth::user()->id)->first();

        $request->validate([
            'kedelai_beli'    => 'required|max:10',
            'ragi_beli'       => 'required|max:10',
        ],[
            'kedelai_beli.required'  => 'pembelian kedelai harus diisi',
            'ragi_beli.required'     => 'pembelian ragi harus diisi',
            'kedelai_beli.max'       => 'tidak boleh melebihi 10 digit',
            'ragi_beli.max'          => 'tidak boleh melebihi 10 digit'
        ]);

    	$pesanan                   = new Pesanan();
    	$pesanan->transaksi_id	   = $transaksi->id;
        $pesanan->user_id          = $user->id; 
	    $pesanan->total_pembelian  = ($transaksi->harga_kedelai*$request->kedelai_beli) + ($transaksi->harga_ragi*$request->ragi_beli);
	    $pesanan->status 		   = "Belum Diverifikasi";

        if ($request->kedelai_beli > $transaksi->stok_kedelai) {
            return redirect('transaksi/beli/'.$id)->with('danger', 'Stok Kedelai Tidak Mencukupi');
        }elseif ($pesanan->kedelai_beli  = $request->kedelai_beli) {
            
            $transaksi->stok_kedelai = $transaksi->stok_kedelai - $pesanan->kedelai_beli;
            $transaksi->update();
        }

        if ($request->ragi_beli > $transaksi->stok_ragi) {
            return redirect('transaksi/beli/'.$id)->with('danger', 'Stok Ragi Tidak Mencukupi');
        }elseif ($pesanan->ragi_beli = $request->ragi_beli) {
            
            $transaksi->stok_ragi = $transaksi->stok_ragi - $pesanan->ragi_beli;
            $transaksi->update();   
        }

        if ($request->kedelai_beli == 0 && $request->ragi_beli == 0) {
            return redirect('transaksi/beli/'.$id)->with('danger', 'Pembelian Kedelai dan Ragi Tidak Boleh 0');
        }


	    $transaksi->pesanan()->save($pesanan);

    	return view('/transaksi/upload_bukti', compact('pesanan'))->with('info','Pesanan Berhasil, Silahkan melakukan pembayaran dan upload bukti pembayaran');
    }

    public function upload_bukti($id)
    {
        $pesanan = Pesanan::find($id);
        return view('transaksi.upload_bukti', compact('pesanan'));
    }

    public function bukti(Request $request, $id)
    {
        
        $pesanan = Pesanan::where('id', $request->id)->first();

        $request->validate([
                'bukti_pembayaran'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],[
                'bukti_pembayaran.required' => 'Harus dalam ekstensi foto dan tidak melibihi 2 MB',
            ]);

        if ($request->hasfile('bukti_pembayaran')) {
            $gambar         = $request->file('bukti_pembayaran');
            $new_gambar     = rand().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('upload/bukti_pembayaran/'), $new_gambar);
            $pesanan->bukti_pembayaran = $new_gambar;
        }
        
        $pesanan->update();
        
        return redirect('/transaksi/riwayat')->with('success', 'Berhasil Upload Bukti Pembayaran');

    }

    public function hapus_pesanan(Request $request, $id)
    {

        $pesanan    = Pesanan::where('id', $id)->first();
        $transaksi  = Transaksi::where('id', $pesanan->transaksi_id)->first();
        $transaksi->stok_kedelai    = $pesanan->kedelai_beli + $transaksi->stok_kedelai;
        $transaksi->stok_ragi       = $pesanan->ragi_beli + $transaksi->stok_ragi;
        
            if ($transaksi->update()) {
                $pesanan->delete();
        }
    

        // alert()->error('Pesanan Berhasil Dihapus', 'Hapus');
        return redirect('/transaksi/riwayat')->with('success', 'Pesanan Berhasil Dihapus');
    }

    public function detail_toko($id)
    {
        $toko = Transaksi::find($id);
        return view('transaksi.detail_toko', compact('toko'));
    }
}
