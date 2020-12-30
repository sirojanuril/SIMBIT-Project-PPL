@extends('layouts.master')

@section('title','Detail Pelanggan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-body">
                    <form class="form-horizontal">
                      @csrf
                          <img src="{{ url('images/') }}/{{ $pelanggan->avatar }}" style="border-radius: 50%; width: 200px; height: 200px; border-style: groove;" >
                        
                      <h3 for="avatar" class="col-sm-10 mt-2 ml-2" style="color: grey;"><b>{{ $pelanggan->nama_lengkap }}</b></h3><br>

                      <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pelanggan->no_hp }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $pelanggan->jenis_kelamin }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}" readonly="" style="width: 50%;">
                        </div>
                      </div>
                      
                      
                    </form>
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a type="submit" href="{{ url('/transaksi/pesanan') }}" class="btn btn-info">Kembali</a>
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
