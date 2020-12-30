@extends('layouts.master')

@section('title','Manajemen Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">

            <div class="form-group">
              <h5>Keuangan :<strong style="color: #c65f5f;"> {{ Carbon\Carbon::parse( $keuangan['tanggal'] )->translatedFormat("d F Y") }} </strong></h5>
          	</div>

            <table class="table" style="text-align: center;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Biaya Produksi</th>
                  <th scope="col">Hasil Penjualan</th>
                  <th scope="col">Profit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"></th>
                  <td width="250px" height="90px"><h1>Rp. {{ number_format($keuangan['biaya_produksi']) }}</h1></td>
                  <td><h1>Rp. {{ number_format($keuangan['hasil_penjualan']) }}</h1> </td>
                  <td><h1>Rp. {{ number_format($keuangan['hasil_pendapatan']) }}</h1></td>
                </tr>
              </tbody>
            </table>

            <a href="{{ url('keuangan/edit') }}/{{ $keuangan->id }}" class="btn btn-info">Edit</a>
            <a href="{{ url('keuangan/hitung') }}" class="btn btn-outline-info">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
