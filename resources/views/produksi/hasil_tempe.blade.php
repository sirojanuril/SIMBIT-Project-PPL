@extends('layouts.master')

@section('title','Hasil Hitung Produksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <br>

            <table class="table" style="text-align: center;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Ragi yang dibutuhkan</th>
                  <th scope="col">Kedelai yang dibutuhkan</th>
                  <th scope="col">Total bungkus tempe</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"></th>
                  <td width="250px" height="90px"><h1>{{ $hasil_ragi }} <strong style="color: #7f8c8d;">gr</strong> </h1></td>
                  <td><h1>{{ $kedelai }} <strong style="color: #7f8c8d;">Kg</strong></h1> </td>
                  <td><h1>{{ $hasil_tempe_perbungkus }} <strong style="color: #7f8c8d;">Bungkus</strong></h1></td>
                </tr>
              </tbody>
            </table>

            <div class="card mt-4" style="width: 18rem;">
              <div class="card-body">
                <label>Kadaluarsa Tempe :</label>
                <strong style="color: #c65f5f;"><h4> {{ Carbon\Carbon::parse($kadaluarsa)->addDays(3)->translatedFormat("d F Y") }} </h4></strong>
              </div>
            </div>

            <a href="/produksi" class="btn btn-info">Kembali</a>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
