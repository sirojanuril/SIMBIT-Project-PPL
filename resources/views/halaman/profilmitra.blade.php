@extends('layouts.master')

@section('title','Profil Saya')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(empty(auth()->user()->avatar))
                  <img src="{{ url('images/default.jpg') }}" style="width: 100px; height: 100px;" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                  @else
                  <img class="profile-user-img img-fluid img-circle" style="width: 100px; height: 100px;" src="{{ url('images/') }}/{{ auth()->user()->avatar }}" alt="User profile picture">
                  @endif
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->nama_lengkap}}</h3>

                <p class="text-muted text-center">{{auth()->user()->level}}</p>

                <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong>Email</strong>
                <p class="text-muted">
                  {{auth()->user()->email}}
                </p>
                <hr>
                <strong> Alamat</strong>
                <p class="text-muted">{{auth()->user()->alamat}}</p>
                <hr>
                <strong> Tanggal Lahir</strong>
                <p class="text-muted">{{auth()->user()->tanggal_lahir}}</p>
                <hr>
                <strong> Jenis Kelamin</strong>
                <p class="text-muted">{{auth()->user()->jenis_kelamin}}</p>
                <hr>
                <strong> No Hp</strong>
                <p class="text-muted">{{auth()->user()->no_hp}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Data</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="/akun/{{auth()->user()->id}}/update" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group row {{$errors->has('nama_lengkap') ? 'has-error' : ''}}">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Nama Lengkap"  name="nama_lengkap" required="" value="{{auth()->user()->nama_lengkap}}">
                          @if($errors->has('nama_lengkap'))
                            <small style="color: red;">{{ $errors->first('nama_lengkap') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required="" value="{{auth()->user()->email}}">
                          @if($errors->has('email'))
                            <small style="color: red;">{{ $errors->first('email') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputName2" placeholder="Tanggal lahir" name="tanggal_lahir" required="" value="{{auth()->user()->tanggal_lahir}}">
                          @if($errors->has('tanggal_lahir'))
                            <small style="color: red;">{{ $errors->first('tanggal_lahir') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('alamat') ? 'has-error' : ''}}">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" required="" placeholder="Alamat" name="alamat">{{auth()->user()->alamat}}</textarea>
                          @if($errors->has('alamat'))
                            <small style="color: red;">{{ $errors->first('alamat') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenis_kelamin" required="">
                                    <option value="{{auth()->user()->jenis_kelamin}}">Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                  <small style="color: red;">{{ $errors->first('jenis_kelamin') }}</small>
                                @endif
                            </div>
                        </div>
                      <div class="form-group row {{$errors->has('no_hp') ? 'has-error' : ''}}">
                        <label for="inputSkills" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10">
                          <input type="number" min="0" class="form-control" id="inputSkills" placeholder="no hp" value="{{auth()->user()->no_hp}}" name="no_hp" required="">
                          @if($errors->has('no_hp'))
                            <small style="color: red;">{{ $errors->first('no_hp') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row {{$errors->has('avatar') ? 'has-error' : ''}}">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Foto Profil</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="inputSkills" placeholder="Foto Profil" name="avatar" value="">
                          @if($errors->has('avatar'))
                            <small style="color: red;">{{ $errors->first('avatar') }}</small>
                          @endif
                          <input type="hidden" class="form-control-file" id="hidden_gambar" name="hidden_gambar" value="{{auth()->user()->avatar}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Ubah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@stop
