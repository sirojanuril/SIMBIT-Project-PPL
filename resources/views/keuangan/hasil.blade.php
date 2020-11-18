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
              <h4>Keuangan :<strong style="color: red;"> {{ Carbon\Carbon::parse( $keuangan['tanggal'] )->translatedFormat("d F Y") }} </strong></h4>
          	</div>

            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td><strong>Biaya Produksi</strong></td>
                  <td>: &nbsp&nbsp Rp. {{ number_format($keuangan['biaya_produksi']) }}</td>
                </tr>
                <tr>
                  <td><strong>Hasil Penjualan</strong></td>
                  <td>: &nbsp&nbsp Rp. {{ number_format($keuangan['hasil_penjualan']) }}</td>
                </tr>
                <td><hr></td>
                <td><hr align="left" style="width: 25%;"></td>
                <tr>
                  <td><strong>Hasil Pendapatan</strong></td>
                  <td>: &nbsp&nbsp Rp. {{ number_format($keuangan['hasil_pendapatan']) }}</td>
                </tr>
              </tbody>
            </table>

            <a href="{{ url('keuangan/edit') }}/{{ $keuangan->id }}" class="btn btn-primary">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
