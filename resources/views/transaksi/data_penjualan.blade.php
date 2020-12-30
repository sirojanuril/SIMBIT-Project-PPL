@extends('layouts.master')

@section('title','Data Penjualan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- untuk membatasi inputan -->
            <?php
                $hide  = \App\Transaksi::where('pengguna_id', Auth::user()->id)->first();
                
            ?>
            @if(empty($hide->pengguna_id))
            <a class="btn btn-light" href="/transaksi/supplier" >+</a>
            
            
            @endif
            
            <a class="btn btn-light active" href="">Data Penjualan</a>
            <a class="btn btn-light" href="{{ url('/transaksi/pesanan') }}">Riwayat Pesanan</a>
            <div class="card-body">
                  @foreach($transaksi as $t)
                    <form class="form-horizontal">
                      @csrf
                      <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status Toko</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" name="status" value="{{ $t->status }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="stok_kedelai" class="col-sm-2 col-form-label">Stok Kedelai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok_kedelai" name="stok_kedelai" value="{{ $t->stok_kedelai }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="stok_ragi" class="col-sm-2 col-form-label">Stok Ragi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok_ragi" name="stok_ragi" value="{{ $t->stok_ragi }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_kedelai" class="col-sm-2 col-form-label">Harga Kedelai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga_kedelai" name="harga_kedelai" value="{{ $t->harga_kedelai }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_ragi" class="col-sm-2 col-form-label">Harga Ragi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga_ragi" name="harga_ragi" value="{{ $t->harga_ragi }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="metode" name="metode" value="{{ $t->metode }} : {{ $t->rekening }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="foto_product" class="col-sm-2 col-form-label">Foto Produk</label>
                        <div class="col-sm-10">
                          <img src="{{ url('upload/foto_product/') }}/{{ $t->foto_product }}" width="40%" class="rounded">
                        </div>
                      </div>
                    </form>
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a type="submit" href="{{ url('/transaksi/ubah_data') }}/{{ $t->id }}" class="btn btn-info">Edit</a>
                        </div>
                      </div>
                    @endforeach

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
