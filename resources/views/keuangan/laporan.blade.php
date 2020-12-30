
@extends('layouts.master')

@section('title','Riwayat Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/keuangan/riwayat') }}" class="btn btn-info">Kembali</a>
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
                @foreach($cetak_pertanggal as $cetak)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ date('d M Y H:i:s', strtotime($cetak->created_at)) }}</td>
                  <td>Rp. {{ number_format($cetak->biaya_produksi) }}</td>
                  <td>Rp. {{ number_format($cetak->hasil_penjualan) }}</td>
                  <td>Rp. {{ number_format($cetak->hasil_pendapatan) }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th><b>Total</b></th>
                  <th><b>Rp. {{ number_format($cetak->filter_biaya_produksi($tanggal_awal, $tanggal_akhir)) }}</b></th>
                  <th><b>Rp. {{ number_format($cetak->filter_hasil_penjualan($tanggal_awal, $tanggal_akhir)) }}</b></th>
                  <th><b>Rp. {{ number_format($cetak->filter_hasil_pendapatan($tanggal_awal, $tanggal_akhir)) }}</b></th>
                </tr>
              </tfoot>
              
            </table>
          </div>
          
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop

