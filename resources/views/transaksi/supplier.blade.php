@extends('layouts.master')

@section('title','Transaksi')

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
            <a class="btn btn-light" href="#penjualan" data-toggle="tab" >+</a>
            @endif

            <a class="btn btn-light" href="{{ url('/transaksi/data_penjualan') }}">Data Penjualan</a>
            <a class="btn btn-light" href="{{ url('/transaksi/pesanan') }}">Pesanan</a>
            <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="penjualan">
                    <form class="form-horizontal" action="{{ url('/transaksi/supplier') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="stok_kedelai" class="col-sm-2 col-form-label">Stok Kedelai</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="stok_kedelai" placeholder="Kedelai (Kg)"  name="stok_kedelai" value="" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="stok_ragi" class="col-sm-2 col-form-label">Stok Ragi</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="stok_ragi" placeholder="Ragi (Kg)" name="stok_ragi" value="" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_kedelai" class="col-sm-2 col-form-label">Harga Kedelai</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="harga_kedelai" placeholder="Harga Kedelai (per Kg)" name="harga_kedelai" value="" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_ragi" class="col-sm-2 col-form-label">Harga Ragi</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="harga_ragi" placeholder="Harga Ragi (per box)" name="harga_ragi" value="" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode</label>
                        <div class="col-sm-10">
                          <div class="rs-select2 js-select-simple select--no-search">
                              <select class="form-control" name="metode" required="">
                                <option value="">-- PILIH --</option>
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
                      <div class="form-group row">
                        <label for="rekening" class="col-sm-2 col-form-label">Rekening</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="rekening" placeholder="Masukkan No. Rekening" name="rekening" value="" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="foto_product" class="col-sm-2 col-form-label">Foto Produk</label>
                        <div class="col-sm-10">
                          <input type="file" id="foto_product" name="foto_product" value="" required="">
                        </div>
                      </div>
                      <div class="form-group row mt-2">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                      </div>
                    </form>
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
