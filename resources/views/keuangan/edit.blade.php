
@extends('layouts.master')

@section('title','Manajemen Keuangan')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3>BIAYA PRODUKSI</h3>
            <form action="{{ url('/keuangan/hasil_edit') }}/{{ $keuangan->id }}" method="post">
              @csrf
              <div class="form-group">
                <label for="bahan_baku">Biaya Bahan Baku</label>
                <input type="number" min="0" class="form-control" id="bahan_baku" value="{{ ($keuangan['bahan_baku']) }}" name="bahan_baku" required="">
              </div>
              <div class="form-group">
                <label for="biaya_tambahan">Biaya Tambahan</label>
                <input type="number" min="0" class="form-control" id="biaya_tambahan" value="{{ ($keuangan['biaya_tambahan']) }}" name="biaya_tambahan" required="">
              </div>
              <div class="form-group">
                <label for="biaya_produksi">Biaya Produksi</label>
                <input type="number" min="0" class="form-control" id="biaya_produksi" value="{{ ($keuangan['biaya_produksi']) }}" name="biaya_produksi" readonly="">
              </div>
              <h3>HASIL PENJUALAN</h3>
              <div class="form-group">
                <label for="jumlah_tempe">Jumlah Tempe Terjual</label>
                <input type="number" min="0" class="form-control" id="jumlah_tempe" value="{{ ($keuangan['jumlah_tempe']) }}" name="jumlah_tempe" required="">
              </div>
              <div class="form-group">
                <label for="hasil_penjualan">Hasil Penjualan</label>
                <input type="number" min="0" class="form-control" id="hasil_penjualan" value="{{ ($keuangan['hasil_penjualan']) }}" name="hasil_penjualan" readonly="">
              </div>
              <h3>HASIL PENDAPATAN</h3>
              <div class="form-group">
                <label for="hasil_pendapatan">Hasil Pendapatan</label>
                <input type="number" min="0" class="form-control" id="hasil_pendapatan" value="{{ ($keuangan['hasil_pendapatan']) }}" name="hasil_pendapatan" readonly="">
              </div>
             <button type="submit" class="btn btn-primary">Simpan</button>
             <button type="submit" class="btn btn-outline-primary" href="{{ url('/keuangan/hasil') }}">Batal</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

