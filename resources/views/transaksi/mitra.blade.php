@extends('layouts.master')

@section('title','Transaksi')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
             <a href="#penjualan" class="btn btn-light" data-toggle="tab">Beli</a>
             <a href="{{ url('/transaksi/riwayat') }}" class="btn btn-light">Riwayat Pemesanan</a>

              <div class="tab-content">
                <div class="tab-pane" id="penjualan">

                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" style="text-align: center;">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Stok Kedelai</th>
                        <th>Stok Ragi</th>
                        <th>Harga Kedelai (Per Kg)</th>
                        <th>Harga Ragi (Per Kg)</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($supplier as $s)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->pengguna->nama_lengkap }}</td>
                        <td>{{ $s->stok_kedelai }}</td>
                        <td>{{ $s->stok_ragi }}</td>
                        <td>Rp. {{ number_format($s->harga_kedelai) }}</td>
                        <td>Rp. {{ number_format($s->harga_ragi) }}</td>
                        <td><a href="{{ url('/transaksi/beli') }}/{{ $s->id }}"><span class="badge badge-success">Beli</span></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-block col-12 mt-2">
                  {{ $supplier->links() }}
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
