@extends('layouts.master')

@section('title','Pembelian')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

            <form action="{{ url('/transaksi/mitra') }}/{{ $transaksi->id }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="kedelai_beli">Kedelai</label>
                <input type="number" class="form-control" id="kedelai_beli" name="kedelai_beli" placeholder="Masukkan berapa kedelai (per kg) yang ingin dibeli" required="">
              </div>
              <div class="form-group">
                <label for="ragi_beli">Ragi</label>
                <input type="number" class="form-control" id="ragi_beli" name="ragi_beli" placeholder="Masukkan berapa ragi (per box) yang ingin dibeli" required="">
              </div>
              <button type="submit" class="btn btn-primary">Beli</button>

            </form>

            

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
