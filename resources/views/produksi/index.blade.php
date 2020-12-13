@extends('layouts.master')

@section('title','Manajemen Produksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="nav link" href="#jumlah_kedelai" data-toggle="tab">Hitung Kedelai</a>
            <div class="tab-content">
              <div class="tab-pane" id="jumlah_kedelai">
                <form action="{{ url('/produksi') }}" method="post">
                  @csrf
                  <div class="form-group {{$errors->has('kedelai') ? 'has-error' : ''}}">
                    <label for="kedelai">Masukkan Kedelai</label>
                    <input type="number" min="0" class="form-control" id="kedelai" name="kedelai" placeholder="dalam kilogram (kg)" style="width: 30%;">
                    @if($errors->has('kedelai'))
                      <small class="form-text text-danger">{{ $errors->first('kedelai') }}</small>
                    @endif
                  </div>
                 <button type="submit" class="btn btn-primary">Hitung</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a class="nav link" href="#jumlah_tempe" data-toggle="tab">Hitung Tempe</a>
                <div class="tab-content">
                  <div class="tab-pane" id="jumlah_tempe">
                    <form action="{{ url('/produksi/hasil_tempe') }}" method="post">
                      @csrf
                      <div class="form-group {{$errors->has('hasil_produksi') ? 'has-error' : ''}}">
                        <label for="hasil_produksi">Masukkan Jumlah Tempe yang akan dibuat</label>
                        <input type="number" min="0" class="form-control" id="hasil_produksi" name="hasil_produksi" placeholder="dalam kilogram (kg)" style="width: 30%;">
                        @if($errors->has('hasil_produksi'))
                          <small class="form-text text-danger">{{ $errors->first('hasil_produksi') }}</small>
                        @endif
                      </div>
                     <button type="submit" class="btn btn-primary">Hitung</button>
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
