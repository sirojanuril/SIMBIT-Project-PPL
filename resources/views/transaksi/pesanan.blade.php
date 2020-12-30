@extends('layouts.master')

@section('title','Riwayat Pesanan')

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
            <a class="btn btn-light" href="/transaksi/supplier" >+</a>
            @endif
            <a class="btn btn-light" href="{{ url('/transaksi/data_penjualan') }}">Data Penjualan</a>
            <a class="btn btn-light active" href="{{ url('/transaksi/pesanan') }}">Riwayat Pesanan</a>

                <div class="card-body table-responsive p-0 mt-2">
                  <table class="table table-hover text-nowrap" style="text-align: center;">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Pelanggan</th>
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
                        <td>
                          <a href="{{ url('/transaksi/detail_pelanggan') }}/{{ $t->user->id }}" style="color: black;"> 
                            {{ $t->user['nama_lengkap'] }}
                          </a>
                        </td>
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
                            <a data-lightbox="image-1" href="{{ url('upload/bukti_pembayaran/') }}/{{ $t->bukti_pembayaran }}">
                              <img src="{{ url('upload/bukti_pembayaran/') }}/{{ $t->bukti_pembayaran }}" width="20%" class="rounded">
                            </a>
                          @else
                            <p>-</p>
                          @endif
                        </td>
                        <td>
                          @if($t->status == "Terverifikasi" && !empty($t->bukti_pembayaran))
                          @else
                          <a href="{{ url('/transaksi/update_pesanan') }}/{{ $t->id }}">Konfirmasi</span></a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-block col-12 mt-2">
                  {{ $pesanan->links() }}
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
