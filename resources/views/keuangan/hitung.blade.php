
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
              <div class="form-group row {{$errors->has('bahan_baku') ? 'has-error' : ''}}">
                <label for="bahan_baku" class="col-sm-2 col-form-label">Biaya Bahan Baku</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="bahan_baku" name="bahan_baku" value="0" placeholder="dalam rupiah (Rp)" required="">
                  <small style="color: grey;">dalam satuan rupiah</small>
                  @if($errors->has('bahan_baku'))
                      <small class="form-text text-danger">{{$errors->first('bahan_baku')}}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row {{$errors->has('biaya_tambahan') ? 'has-error' : ''}}">
                <label for="biaya_tambahan" class="col-sm-2 col-form-label">Biaya Tambahan</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="biaya_tambahan" name="biaya_tambahan" value="0" placeholder="dalam rupiah (Rp)" required="">
                  <small style="color: grey;">dalam satuan rupiah</small>
                  @if($errors->has('biaya_tambahan'))
                      <small class="form-text text-danger">{{$errors->first('biaya_tambahan')}}</small>
                  @endif

                </div>
              </div>
              <hr>
              <h4 style="color: #acc3d2;">HASIL PENJUALAN</h4>
              <div class="form-group row {{$errors->has('jumlah_tempe') ? 'has-error' : ''}}">
                <label for="jumlah_tempe" class="col-sm-2 col-form-label">Jumlah Tempe Terjual</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="jumlah_tempe" name="jumlah_tempe" value="0" placeholder="dalam rupiah (Rp)" required="">
                  <small style="color: grey;">dalam satuan bungkus (Rp. 1000 per bungkus)</small>
                  @if($errors->has('jumlah_tempe'))
                      <small class="form-text text-danger">{{$errors->first('jumlah_tempe')}}</small>
                  @endif

                </div>
              </div>

             <button type="submit" class="btn btn-info">Lihat Hasil</button>
             <a href="{{ url('keuangan/riwayat') }}" class="btn btn-outline-info">Riwayat</a>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop

