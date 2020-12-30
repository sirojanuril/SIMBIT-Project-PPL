
@extends('layouts.master')

@section('title','Riwayat Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/keuangan/hitung') }}" class="btn btn-info">Kembali</a>
            <a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Filter Tanggal</a>
            <h3 align="center">RIWAYAT KEUANGAN</h3>
          <div class="table-responsive">
            <table class="table table-stripped myTable text-center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal/Jam</th>
                  <th>Biaya Produksi</th>
                  <th>Hasil Penjualan</th>
                  <th>Profit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($riwayat as $riwayats)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ date('d M Y H:i:s', strtotime($riwayats->created_at)) }}</td>
                  <td>Rp. {{ number_format($riwayats->biaya_produksi) }}</td>
                  <td>Rp. {{ number_format($riwayats->hasil_penjualan) }}</td>
                  <td>Rp. {{ number_format($riwayats->hasil_pendapatan) }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th><b>Total</b></th>
                  <th><b>Rp. {{ number_format($riwayats->total_biaya_produksi()) }}</b></th>
                  <th><b>Rp. {{ number_format($riwayats->total_hasil_penjualan()) }}</b></th>
                  <th><b>Rp. {{ number_format($riwayats->total_hasil_pendapatan()) }}</b></th>
                </tr>
              </tfoot>
              
            </table>
          </div>
          <!-- <a href="{{ url('/keuangan/hitung') }}" class="btn btn-info">Kembali</a> -->
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- modal filter -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/keuangan/laporan') }}" method="get">
          @csrf
          <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal</label>
            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required="">
          </div>
          <div class="form-group">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required="">
          </div>

          <div class="modal-footer">
             <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tanggal_awal').value + '/' + document.getElementById('tanggal_akhir').value" class="btn btn-info col-md-12">Lihat Riwayat Keuangan 
           </a>
           <!-- <a href="" class="btn btn-info col-md-12">Lihat Riwayat Keuangan</a> -->
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@stop

