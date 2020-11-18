
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
            <form action="{{ url('/keuangan/hitung') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="bahan_baku">Biaya Bahan Baku</label>
                <input type="number" min="0" class="form-control" id="bahan_baku" name="bahan_baku" placeholder="dalam rupiah (Rp)" required="">
              </div>
              <div class="form-group">
                <label for="biaya_tambahan">Biaya Tambahan</label>
                <input type="number" min="0" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="dalam rupiah (Rp)" required="">
              </div>
              <h3>HASIL PENJUALAN</h3>
              <div class="form-group">
                <label for="jumlah_tempe">Jumlah Tempe Terjual</label>
                <input type="number" min="0" class="form-control" id="jumlah_tempe" name="jumlah_tempe" placeholder="dalam rupiah (Rp)" required="">
              </div>

<!--               <div class="tab-content mt-3">
                <div class="tab-pane" id="biaya_produksi">
	               	<div class="form-group">
		                <label for="biaya_produksi">Biaya Produksi</label>
		                <input type="text" min="0" class="form-control" id="biaya_produksi" value="" name="biaya_produksi"readonly="">
              		</div>
              	</div>
              </div> -->

<!--              <button type="submit" class="btn btn-primary" href="#biaya_produksi" data-toggle="tab">Lihat Biaya Produksi</button>
 -->
             <button type="submit" class="btn btn-primary">Lihat Hasil</button>



            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>


<!--       <div class="col">
      	<div class="card">
          <div class="card-header">
            <h3 align="center">HASIL PENJUALAN</h3>
            <form action="{{ url('/keuangan/hitung_penjualan') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="jumlah_tempe">Jumlah Tempe Terjual</label>
                <input type="number" min="0" class="form-control" id="jumlah_tempe" name="jumlah_tempe" placeholder="dalam rupiah (Rp)" required="">
              </div>

              <div class="tab-content mt-3">
                <div class="tab-pane" id="penjualan">
	               	<div class="form-group">
		                <label for="hasil_penjualan">Hasil Penjualan</label>
		                <input type="text" class="form-control" id="hasil_penjualan" name="hasil_penjualan"readonly="">
              		</div>
              	</div>
              </div>

             <button type="submit" class="btn btn-primary" href="#penjualan" data-toggle="tab">Lihat Hasil Penjualan</button>

             <button type="submit" class="btn btn-primary">Lihat Hasil Penjualan</button>


            </form>
          </div>
        </div>
      	
      </div> -->
    </div>
  </div>
</div>
@stop

