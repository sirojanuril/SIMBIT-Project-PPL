@extends('layouts.master')

@section('title','Data Supplier')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Lengkap</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data_pengguna as $pengguna)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$pengguna->nama_lengkap}}</td>
                          <td>{{$pengguna->tanggal_lahir}}</td>
                          <td>{{$pengguna->jenis_kelamin}}</td>
                          <td>{{$pengguna->email}}</td>
                          <td>{{$pengguna->alamat}}</td>
                          <td>{{$pengguna->no_hp}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="d-block col-12 mt-2">
                  {{ $data_pengguna->links() }}
                </div>
                </div>

              </div>
            </div>
          </div>
  </div>
</div>
@stop
