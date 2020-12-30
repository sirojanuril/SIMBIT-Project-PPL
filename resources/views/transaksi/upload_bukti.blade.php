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
              <div class="form-group {{$errors->has('bukti_pembayaran') ? 'has-error' : ''}}">
                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                <img src="{{ url('upload/bukti_pembayaran/') }}/{{ $pesanan->bukti_pembayaran }}" class="card" style="width: 200px;">
                <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran" value="{{ $pesanan->bukti_pembayaran }}">
                @if($errors->has('bukti_pembayaran'))
                  <small class="form-text text-danger">{{ $errors->first('bukti_pembayaran') }}</small>
                @endif
              </div>
              <button type="submit" class="btn btn-info" onclick="return confirm('Setelah anda mengupload bukti pembayaran anda tidak bisa membatalkan pesanan');">Simpan</button>
              <a href="/transaksi/riwayat" class="btn btn-outline-info">Kembali</a>
            </form>

            <p class="mt-4">Silahkan melakukan pembayaran ke rekening <strong style="color: #c65f5f;">{{ $pesanan->transaksi->metode }} : {{ $pesanan->transaksi->rekening }}</strong> dengan total harga <strong style="color: #c65f5f;">Rp. {{ number_format($pesanan->total_pembelian) }}</strong> </p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
