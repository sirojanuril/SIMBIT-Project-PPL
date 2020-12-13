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
                $transaksi  = \App\Transaksi::where('pengguna_id', Auth::user()->id)->first();

                if (!empty($transaksi)) 
                {
                    $hide         = $transaksi->pengguna_id;
                }
                
            ?>
            @if(empty($transaksi->pengguna_id))
            <a class="btn btn-light" href="#penjualan" data-toggle="tab">+</a>
            @else
            <a class="btn btn-light">+</a>
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
                          <input type="number" class="form-control" id="harga_ragi" placeholder="Harga Ragi (per Kg)" name="harga_ragi" value="" required="">
                        </div>
                      </div>
<!--                       <div class="form-group row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode Pembayaran :</label> -->
                         
                       <!--  <div class="col-sm-10">
                          <label for="bni" class="col-sm-2 col-form-label">BNI</label>
                          <input type="number" class="form-control" id="bni" name="bni" value="" required=""> -->

<!--                           <label for="bri" class="col-sm-2 col-form-label">BRI</label>
                          <input type="number" class="form-control" id="bri" name="bri" value="" required="">

                          <label for="bca" class="col-sm-2 col-form-label">BCA</label>
                          <input type="number" class="form-control" id="bca" name="bca" value="" required="">

                          <label for="mandiri" class="col-sm-2 col-form-label">Mandiri</label>
                          <input type="number" class="form-control" id="mandiri" name="mandiri" value="" required="">

                          <label for="btpn" class="col-sm-2 col-form-label">BTPN</label>
                          <input type="number" class="form-control" id="btpn" name="btpn" value="" required="">

                          <label for="ovo" class="col-sm-2 col-form-label">OVO</label>
                          <input type="number" class="form-control" id="ovo" name="ovo" value="" required="">

                          <label for="gopay" class="col-sm-2 col-form-label">Gopay</label>
                          <input type="number" class="form-control" id="gopay" name="gopay" value="" required="">

                          <label for="dana" class="col-sm-2 col-form-label">Gopay</label>
                          <input type="number" class="form-control" id="dana" name="dana" value="" required=""> -->
                     <!--  </div>
                    </div> -->


<!--                       <div class="form-group row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-10">
                          <select name="metode_id" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="">BNI</option>
                            <option value="">BRI</option>
                            <option value="">Mandiri</option>
                            <option value="">BCA</option>
                            <option value="">BTPN</option>

                          </select>
                        </div>
                      </div> -->

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
