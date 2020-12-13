
@extends('layouts.master')

@section('title','Manajemen Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <form action="{{ url('/keuangan/hitung') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required="">
              </div>
              <div class="form-group">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required="">
              </div>

             <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tanggal_awal').value + '/' + document.getElementById('tanggal_akhir').value" class="btn btn-success col-md-12">Cetak <i class="fas fa-print"></i> 
             </a>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop

