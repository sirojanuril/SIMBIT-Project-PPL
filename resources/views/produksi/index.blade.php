@extends('layouts.master')

@section('title','Manajemen Produksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <br>
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
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@stop
