@extends('layouts.master')

@section('title','Riwayat Pemesanan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="/transaksi/mitra" class="btn btn-light">Beli</a>
            <a href="{{ url('/transaksi/riwayat') }}" class="btn btn-light active">Riwayat Pemesanan</a>
                <div class="card-body table-responsive p-0 mt-2">
                  <table class="table table-hover text-nowrap" style="text-align: center;">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Supplier</th>
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
                        <td>{{ $t->transaksi['pengguna']['nama_lengkap'] }}</td>
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
                          @if(empty($t->bukti_pembayaran))
                          <a href="{{ url('/transaksi/upload_bukti') }}/{{ $t->id }}">Upload Bukti</a>
                          @else
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-block col-12">
                  {{ $pesanan->links() }}
                </div>
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
