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
            <table class="table table-borderless" cellspacing="0">
              <tbody>
                <tr>
                  <td><strong>Ragi yang dibutuhkan</strong></td>
                  <td>:</td>
                  <td>{{ $hasil_ragi }}</td>
                  <td><strong>gr</strong></td>
                </tr>
                <tr>
                  <td><strong>Menghasilkan Tempe Sekitar</strong></td>
                  <td>:</td>
                  <td>{{ $hasil_tempe }}</td>
                  <td><strong>Kg</strong></td>
                </tr>
                <tr>
                  <td> </td>
                  <td>:</td>
                  <td>{{ $hasil_tempe_perbungkus }}</td>
                  <td><strong>Bungkus</strong></td>
                </tr>
              </tbody>
            </table>


            <div class="form-group">
              <label>Kadaluarsa Tempe :</label>
              <p>Tempe akan kadaluarsa sekitar <strong style="color: red;"> {{ Carbon\Carbon::parse($kadaluarsa)->addDays(3)->format("d/m/Y") }} </strong></p>                   
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
