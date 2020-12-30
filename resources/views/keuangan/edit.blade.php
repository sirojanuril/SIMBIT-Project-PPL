
@extends('layouts.master')

@section('title','Manajemen Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4 style="color: #acc3d2;">BIAYA PRODUKSI</h4>
            <form action="{{ url('/keuangan/hasil_edit') }}/{{ $keuangan->id }}" method="post">
              @csrf
              <div class="form-group row {{$errors->has('bahan_baku') ? 'has-error' : ''}}">
                <label for="bahan_baku" class="col-sm-2 col-form-label">Biaya Bahan Baku</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="bahan_baku" value="{{ ($keuangan['bahan_baku']) }}" name="bahan_baku" required="">
                  <small style="color: grey;">dalam satuan rupiah</small>
                  @if($errors->has('bahan_baku'))
                      <small class="form-text text-danger">{{$errors->first('bahan_baku')}}</small>
                  @endif
                </div>
              </div>
              <div class="form-group row {{$errors->has('biaya_tambahan') ? 'has-error' : ''}}">
                <label for="biaya_tambahan" class="col-sm-2 col-form-label">Biaya Tambahan</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="biaya_tambahan" value="{{ ($keuangan['biaya_tambahan']) }}" name="biaya_tambahan" required="">
                  <small style="color: grey;">dalam satuan rupiah</small>
                  @if($errors->has('biaya_tambahan'))
                      <small class="form-text text-danger">{{$errors->first('biaya_tambahan')}}</small>
                  @endif
                </div>
              </div>
              
              <h4 style="color: #acc3d2;">HASIL PENJUALAN</h4>
              <div class="form-group row {{$errors->has('jumlah_tempe') ? 'has-error' : ''}}">
                <label for="jumlah_tempe" class="col-sm-2 col-form-label">Jumlah Tempe Terjual</label>
                <div class="col-sm-10">
                  <input type="number" min="0" class="form-control" id="jumlah_tempe" value="{{ ($keuangan['jumlah_tempe']) }}" name="jumlah_tempe" required="">
                  <small style="color: grey;">dalam satuan bungkus (Rp. 1000 per bungkus)</small>
                  @if($errors->has('jumlah_tempe'))
                      <small class="form-text text-danger">{{$errors->first('jumlah_tempe')}}</small>
                  @endif
                </div>
              </div>

             <button type="submit" class="btn btn-info">Simpan</button>
             <button type="submit" class="btn btn-outline-info" href="{{ url('/keuangan/hasil') }}">Batal</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

