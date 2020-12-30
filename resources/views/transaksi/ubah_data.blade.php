@extends('layouts.master')

@section('title','Edit Data Penjualan')

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
                    <label for="status" class="col-sm-2 col-form-label">Status Toko</label>
                    <div class="col-sm-10">
                      <div class="rs-select2 js-select-simple select--no-search">
                          <select class="form-control" name="status" required="">
                            <option value="{{ $transaksi->status }}">-- PILIH --</option>
                            <option value="Buka"{{(old('status') == 'Buka') ? ' selected' : ''}}>Buka</option>
                            <option value="Tutup"{{(old('status') == 'Tutup') ? ' selected' : ''}}>Tutup</option>
                          </select>
                          <div class="select-dropdown"></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group row {{$errors->has('stok_kedelai') ? 'has-error' : ''}}">
                    <label for="stok_kedelai" class="col-sm-2 col-form-label">Stok Kedelai</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" min="0" id="stok_kedelai" name="stok_kedelai" value="{{ $transaksi->stok_kedelai }}" required="">
                      @if($errors->has('stok_kedelai'))
                        <small class="form-text text-danger">{{ $errors->first('stok_kedelai') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row {{$errors->has('stok_ragi') ? 'has-error' : ''}}">
                    <label for="stok_ragi" class="col-sm-2 col-form-label">Stok Ragi</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" min="0" id="stok_ragi" name="stok_ragi" value="{{ $transaksi->stok_ragi }}" required="">
                      @if($errors->has('stok_ragi'))
                        <small class="form-text text-danger">{{ $errors->first('stok_ragi') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row {{$errors->has('harga_kedelai') ? 'has-error' : ''}}">
                    <label for="harga_kedelai" class="col-sm-2 col-form-label">Harga Kedelai</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" min="0" id="harga_kedelai" name="harga_kedelai" value="{{ $transaksi->harga_kedelai }}" required="">
                      @if($errors->has('harga_kedelai'))
                        <small class="form-text text-danger">{{ $errors->first('harga_kedelai') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row {{$errors->has('harga_ragi') ? 'has-error' : ''}}">
                    <label for="harga_ragi" class="col-sm-2 col-form-label">Harga Ragi</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" min="0" id="harga_ragi" name="harga_ragi" value="{{ $transaksi->harga_ragi }}" required="">
                      @if($errors->has('harga_ragi'))
                        <small class="form-text text-danger">{{ $errors->first('harga_ragi') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-10">
                          <div class="rs-select2 js-select-simple select--no-search">
                              <select class="form-control" name="metode" required="">
                                <option value="{{ $transaksi->metode }}">-- PILIH --</option>
                                <option value="BNI"{{(old('metode') == 'BNI') ? ' selected' : ''}}>BNI</option>
                                <option value="BRI"{{(old('metode') == 'BRI') ? ' selected' : ''}}>BRI</option>
                                <option value="BCA"{{(old('metode') == 'BCA') ? ' selected' : ''}}>BCA</option>
                                <option value="MANDIRI"{{(old('metode') == 'MANDIRI') ? ' selected' : ''}}>MANDIRI</option>
                                <option value="OVO"{{(old('metode') == 'OVO') ? ' selected' : ''}}>OVO</option>
                                <option value="GOPAY"{{(old('metode') == 'GOPAY') ? ' selected' : ''}}>GOPAY</option>
                                <option value="DANA"{{(old('metode') == 'DANA') ? ' selected' : ''}}>DANA</option>
                              </select>
                              <div class="select-dropdown"></div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('rekening') ? 'has-error' : ''}}">
                        <label for="rekening" class="col-sm-2 col-form-label">Rekening</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="rekening" placeholder="Masukkan No. Rekening" name="rekening" min="0" value="{{ $transaksi->rekening }}" required="">
                          @if($errors->has('rekening'))
                            <small class="form-text text-danger">{{ $errors->first('rekening') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('foto_product') ? 'has-error' : ''}}">
                        <label for="foto_product" class="col-sm-2 col-form-label">Foto Produk</label>
                        <div class="col-sm-10">
                          <input type="file" id="foto_product" name="foto_product" value="">
                          @if($errors->has('foto_product'))
                            <small class="form-text text-danger">{{ $errors->first('foto_product') }}</small>
                          @endif
                          <img src="{{ url('upload/foto_product') }}/{{ $transaksi->foto_product }}" class="card" style="width: 40%;">
                          <input type="hidden" class="form-control-file" id="hidden_gambar" name="hidden_gambar" value="{{ $transaksi->foto_product }}">
                        </div>
                      </div>
                
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="/transaksi/supplier" class="btn btn-outline-info">Batal</a>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('metode')
<script>
$(document).ready(function() {
  
     $("#bni").click(function() {
       $("#metode_bni").remove();
     })
  
    $("#bri").click(function() {
       $("#metode_bri").remove();
     })
 
    $("#bca").click(function() {
       $("#metode_bca").remove();
     })

    $("#mandiri").click(function() {
       $("#metode_mandiri").remove();
     })

    $("#btpn").click(function() {
       $("#metode_btpn").remove();
     })
    
    $("#ovo").click(function() {
       $("#metode_ovo").remove();
     })

    $("#gopay").click(function() {
       $("#metode_gopay").remove();
     })

    $("#dana").click(function() {
       $("#metode_dana").remove();
     })
 
   });
</script>

@stop
