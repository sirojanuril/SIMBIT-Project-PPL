@extends('layouts.master')

@section('title','Riwayat Transaksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

            <form action="{{ url('/transaksi/riwayat') }}/{{ $pesanan->id }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                <img src="{{ url('upload/bukti_pembayaran/') }}/{{ $pesanan->bukti_pembayaran }}" class="card" style="width: 190;">
                <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran" value="{{ $pesanan->bukti_pembayaran }}">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
