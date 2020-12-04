
@extends('layouts.master')

@section('title','Manajemen Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3 align="center">LAPORAN KEUANGAN</h3>
          <div class="form-group">
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
              <tr align="center">
                <th>No.</th>
                <th>Tanggal/Jam</th>
                <th>Biaya Produksi</th>
                <th>Hasil Penjualan</th>
                <th>Hasil Pendapatan</th>
              </tr>
              @foreach($cetak_pertanggal as $cetak)
              <tr align="center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cetak->created_at }}</td>
                <td>{{ $cetak->biaya_produksi }}</td>
                <td>{{ $cetak->hasil_penjualan }}</td>
                <td>{{ $cetak->hasil_pendapatan }}</td>
              </tr>
              @endforeach
            </table>
          </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop

