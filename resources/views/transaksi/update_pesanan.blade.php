@extends('layouts.master')

@section('title','Riwayat Transaksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

            <form class="form-horizontal" action="{{ url('/transaksi/pesanan') }}/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label for="stok_kedelai" class="col-sm-2 col-form-label">Kedelai</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="stok_kedelai" placeholder="Kedelai (Kg)"  name="stok_kedelai" readonly="" value="{{ $pesanan->kedelai_beli }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="stok_ragi" class="col-sm-2 col-form-label">Ragi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="stok_ragi" placeholder="Ragi (Kg)" name="stok_ragi" readonly="" value="{{ $pesanan->ragi_beli }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="harga_kedelai" class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="harga_kedelai" placeholder="Harga Kedelai (per Kg)" name="harga_kedelai" readonly="" value="{{ $pesanan->total_pembelian }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <div class="rs-select2 js-select-simple select--no-search">
                      <select class="form-control" name="status">
                        <option value="">-- PILIH --</option>
                        <option value="Terverifikasi"{{(old('status') == 'Terverifikasi') ? ' selected' : ''}}>Terverifikasi</option>
                        <option value="Belum Diverifikasi"{{(old('status') == 'Belum Diverifikasi') ? ' selected' : ''}}>Belum Terverifikasi</option>
                      </select>
                      <div class="select-dropdown"></div>
                    </div>
                </div>
              </div>
            @if(empty($pesanan->bukti_pembayaran) && $pesanan->status == "Belum Diverifikasi")
              <strong style="color: #c65f5f;">Pelanggan Belum Mengupload Bukti Pembayaran</strong><br>
              <a href="/transaksi/supplier" class="btn btn-info mt-2">Kembali</a>
            @elseif($pesanan->status == "Belum Diverifikasi")
              <button type="submit" class="btn btn-info">Simpan</button>
              <a href="/transaksi/supplier" class="btn btn-outline-info">Kembali</a>
            @else
              <strong style="color: #c65f5f;">Anda sudah melakukan konfirmasi pesanan</strong><br>
              <a href="/transaksi/supplier" class="btn btn-info mt-2">Kembali</a>
            @endif
            
            
          </div>
          
            
          
          </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
