@extends('layouts.master')

@section('title','Pembelian')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <p>
              <a class="btn btn-light" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Kedelai</a>
              <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Ragi</button>
            </p>

            <form action="{{ url('/transaksi/upload_bukti') }}/{{ $transaksi->id }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="form-group">
                      <label for="kedelai_beli">Kedelai</label>
                      <input type="number" min="0" class="form-control" id="kedelai_beli" name="kedelai_beli" placeholder="Masukkan berapa kedelai (per kg) yang ingin dibeli" value="0" required="">
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="form-group">
                      <label for="ragi_beli">Ragi</label>
                      <input type="number" min="0" class="form-control" id="ragi_beli" name="ragi_beli" placeholder="Masukkan berapa ragi (per box) yang ingin dibeli" value="0" required="">
                    </div>  
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-info">Beli</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
