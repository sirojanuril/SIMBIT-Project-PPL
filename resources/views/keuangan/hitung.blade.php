
@extends('layouts.master')

@section('title','Manajemen Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 style="color: #acc3d2;">BIAYA PRODUKSI</h4>
            <form class="form-horizontal" action="{{ url('/keuangan/hitung') }}" method="post">
              @csrf
              <div class="form-group row">
                <label for="bahan_baku" class="col-sm-2 col-form-label">Biaya Bahan Baku</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="bahan_baku" name="bahan_baku" placeholder="dalam rupiah (Rp)" required="">
                </div>
              </div>
              <div class="form-group row">
                <label for="biaya_tambahan" class="col-sm-2 col-form-label">Biaya Tambahan</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="dalam rupiah (Rp)" required="">
                </div>
              </div>
              <hr>
              <h4 style="color: #acc3d2;">HASIL PENJUALAN</h4>
              <div class="form-group row">
                <label for="jumlah_tempe" class="col-sm-2 col-form-label">Jumlah Tempe Terjual</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="jumlah_tempe" name="jumlah_tempe" placeholder="dalam rupiah (Rp)" required="">
                </div>
              </div>

             <button type="submit" class="btn btn-info">Lihat Hasil</button>
             <a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-print"></i></a>

            </form>

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

                      <div class="modal-footer">
                         <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tanggal_awal').value + '/' + document.getElementById('tanggal_akhir').value" class="btn btn-info col-md-12">Cetak <i class="fas fa-print"></i> 
                       </a>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop

