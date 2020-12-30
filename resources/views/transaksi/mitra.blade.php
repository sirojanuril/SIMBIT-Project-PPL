@extends('layouts.master')

@section('title','Transaksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mb-2">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-light active">Beli</button>
          <a href="{{ url('/transaksi/riwayat') }}" class="btn btn-light">Riwayat Pembelian</a>
        </div>
      </div>

       @foreach($supplier as $s)
       @if($s->stok_kedelai == 0 && $s->stok_ragi == 0)
       @elseif($s->status == "Tutup")
       @else
        <div class="col-sm-4">
          <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card">
              <img src="{{ url('upload/foto_product') }}/{{ $s->foto_product }}" class="card-img-top"  alt="...">
              <div class="card-body">
                <p class="card-text">
                    <a href="{{ url('/transaksi/detail_toko') }}/{{ $s->id }}" ><h3 style="color: #3949ab; text-align: center;">Toko {{ $s->pengguna->nama_lengkap }}</h3></a>
                    <strong> Stok Kedelai : </strong> {{ $s->stok_kedelai }} kg <small>(Rp. {{ number_format($s->harga_kedelai) }} /kg) </small><br>
                    <strong> Stok Ragi : </strong> {{ $s->stok_ragi }} kg <small>(Rp. {{ number_format($s->harga_ragi) }} /kg)</small><br>
                </p>
                <div class="card-body text-center">
                  <a href="{{ url('/transaksi/beli') }}/{{ $s->id }}" class="btn btn-info"><i class="fas fa-shopping-cart"></i> Beli</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
      @endforeach

      <div class="d-block col-12 mt-2">
        {{ $supplier->links() }}
      </div>
      
    </div>
  </div>
</div>
@stop
