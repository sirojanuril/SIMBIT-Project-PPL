@extends('layouts.master')

@section('title','Pesanan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-light" href="/transaksi/supplier" >+</a>
            <a class="btn btn-light" href="{{ url('/transaksi/data_penjualan') }}">Data Penjualan</a>
            <a class="btn btn-light active" href="{{ url('/transaksi/pesanan') }}">Pesanan</a>

                <div class="card-body table-responsive p-0 mt-2">
                  <table class="table table-hover text-nowrap" style="text-align: center;">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Mitra</th>
                        <th>Kedelai</th>
                        <th>Ragi</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pesanan as $t)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->user['nama_lengkap'] }}</td>
                        <td>{{ $t->kedelai_beli }}</td>
                        <td>{{ $t->ragi_beli }}</td>
                        <td>Rp. {{ number_format($t->total_pembelian) }}</td>
                        <td>
                          @if($t->status == "Terverifikasi")
                          <span class="badge badge-success">{{ $t->status }}</span>
                          @else
                          <span class="badge badge-danger">{{ $t->status }}</span>
                          @endif
                        </td>
                        <td style="width: 10%;">
                          @if(!empty($t->bukti_pembayaran))
                          <img src="{{ url('upload/bukti_pembayaran/') }}/{{ $t->bukti_pembayaran }}" width="20%" class="rounded">
                          @else
                          <p>-</p>
                          @endif
                        </td>
                        <td>
                          <a href="{{ url('/transaksi/update_pesanan') }}/{{ $t->id }}">Konfirmasi</span></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
