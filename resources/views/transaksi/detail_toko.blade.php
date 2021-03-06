@extends('layouts.master')

@section('title','Detail Toko')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                    <form class="form-horizontal">
                      @csrf
                      <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Toko</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $toko->pengguna->nama_lengkap }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $toko->pengguna->no_hp }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $toko->pengguna->alamat }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="stok_kedelai" class="col-sm-2 col-form-label">Stok Kedelai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok_kedelai" name="stok_kedelai" value="{{ $toko->stok_kedelai }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="stok_ragi" class="col-sm-2 col-form-label">Stok Ragi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok_ragi" name="stok_ragi" value="{{ $toko->stok_ragi }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_kedelai" class="col-sm-2 col-form-label">Harga Kedelai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga_kedelai" name="harga_kedelai" value="Rp. {{ number_format($toko->harga_kedelai) }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_ragi" class="col-sm-2 col-form-label">Harga Ragi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga_ragi" name="harga_ragi" value="Rp. {{ number_format($toko->harga_ragi) }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="metode" name="metode" value="{{ $toko->metode }} : {{ $toko->rekening }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="foto_product" class="col-sm-2 col-form-label">Foto Produk</label>
                        <div class="col-sm-10">
                          <img src="{{ url('upload/foto_product') }}/{{ $toko->foto_product }}" width="40%" class="rounded">
                        </div>
                      </div>
                    </form>
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a type="submit" href="{{ url('/transaksi/mitra') }}" class="btn btn-info">Kembali</a>
                        </div>
                      </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
