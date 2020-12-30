@extends('layouts.master')

@section('title','Manajemen Produksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <a href="{{ url('/produksi') }}" class="btn btn-light">Hitung Kedelai</a>
        <a href="{{ url('/produksi/hitung_tempe') }}" class="btn btn-light active">Hitung Tempe</a>

          <div class="card" style="text-align: center;">
            <div class="card-body">
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
@stop
