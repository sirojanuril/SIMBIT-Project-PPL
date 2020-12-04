@extends('layouts.master')

@section('title','Manajemen Produksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-light" href="#jumlah_kedelai" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Hitung Kedelai</button>
          <button type="button" class="btn btn-light" href="#jumlah_tempe" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Hitung Tempe</button>
        </div>

        <div class="col">
          <div class="card" style="text-align: center;">
            <div class="card-body">
              <div class="collapse multi-collapse" id="jumlah_kedelai">
                <form action="{{ url('/produksi') }}" method="post">
                  @csrf
                  <div class="form-group {{$errors->has('kedelai') ? 'has-error' : ''}}">
                    <label for="kedelai">Masukkan Kedelai</label>
                    <input type="number" min="0" class="form-control" id="kedelai" name="kedelai" placeholder="dalam kilogram (kg)">
                    @if($errors->has('kedelai'))
                      <small class="form-text text-danger">{{ $errors->first('kedelai') }}</small>
                    @endif
                  </div>
                 <button type="submit" class="btn btn-info">Hitung</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card" style="text-align: center;">
            <div class="card-body">
              <div class="collapse multi-collapse mt-4" id="jumlah_tempe">
                <form action="{{ url('/produksi/hasil_tempe') }}" method="post">
                  @csrf
                  <div class="form-group {{$errors->has('hasil_produksi') ? 'has-error' : ''}}">
                    <label for="hasil_produksi">Masukkan Jumlah Tempe yang akan dibuat</label>
                    <input type="number" min="0" class="form-control" id="hasil_produksi" name="hasil_produksi" placeholder="dalam kilogram (kg)">
                    @if($errors->has('hasil_produksi'))
                      <small class="form-text text-danger">{{ $errors->first('hasil_produksi') }}</small>
                    @endif
                  </div>
                 <button type="submit" class="btn btn-info">Hitung</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@stop
