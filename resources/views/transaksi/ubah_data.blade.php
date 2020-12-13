@extends('layouts.master')

@section('title','Riwayat Transaksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

            <form class="form-horizontal" action="{{ url('/transaksi/data_penjualan') }}/{{ $transaksi->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label for="stok_kedelai" class="col-sm-2 col-form-label">Stok Kedelai</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="stok_kedelai" name="stok_kedelai" value="{{ $transaksi->stok_kedelai }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="stok_ragi" class="col-sm-2 col-form-label">Stok Ragi</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="stok_ragi" name="stok_ragi" value="{{ $transaksi->stok_ragi }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="harga_kedelai" class="col-sm-2 col-form-label">Harga Kedelai</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="harga_kedelai" name="harga_kedelai" value="{{ $transaksi->harga_kedelai }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="harga_ragi" class="col-sm-2 col-form-label">Harga Ragi</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="harga_ragi" name="harga_ragi" value="{{ $transaksi->harga_ragi }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="bni" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="bni" placeholder="BNI" name="bni" value="{{ $transaksi->metode['bni'] }}">
                </div>
              </div>
            <a href="/transaksi/supplier" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>  
        </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
