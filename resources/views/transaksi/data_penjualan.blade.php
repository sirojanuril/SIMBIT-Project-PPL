@extends('layouts.master')

@section('title','Transaksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-light" href="/transaksi/supplier" >+</a>
            <a class="btn btn-light active" href="">Data Penjualan</a>
            <a class="btn btn-light" href="{{ url('/transaksi/pesanan') }}">Pesanan</a>
            <div class="card-body">
                  @foreach($transaksi as $t)
                    <form class="form-horizontal">
                      @csrf
                      <div class="form-group row">
                        <label for="stok_kedelai" class="col-sm-2 col-form-label">Stok Kedelai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok_kedelai" name="stok_kedelai" value="{{ $t->stok_kedelai }}" readonly="" style="width: 10%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="stok_ragi" class="col-sm-2 col-form-label">Stok Ragi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="stok_ragi" name="stok_ragi" value="{{ $t->stok_ragi }}" readonly="" style="width: 10%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_kedelai" class="col-sm-2 col-form-label">Harga Kedelai</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga_kedelai" name="harga_kedelai" value="{{ $t->harga_kedelai }}" readonly="" style="width: 10%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga_ragi" class="col-sm-2 col-form-label">Harga Ragi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="harga_ragi" name="harga_ragi" value="{{ $t->harga_ragi }}" readonly="" style="width: 10%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bni" class="col-sm-2 col-form-label">Metode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="bni" name="bni" value="{{ $t->metode['bni'] }}" readonly="" style="width: 10%;">
                        </div>
                      </div>
                    </form>
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a type="submit" href="{{ url('/transaksi/ubah_data') }}/{{ $t->id }}" class="btn btn-primary">Ubah</a>
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
