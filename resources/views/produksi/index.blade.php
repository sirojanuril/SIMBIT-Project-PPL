@extends('layouts.master')

@section('title','Manajemen Produksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <a href="{{ url('/produksi') }}" class="btn btn-light active">Hitung Kedelai</a>
        <a href="{{ url('/produksi/hitung_tempe') }}" class="btn btn-light">Hitung Tempe</a>
        

          <div class="card" style="text-align: center;">
            <div class="card-body">
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
  </div>
</div>
@stop
