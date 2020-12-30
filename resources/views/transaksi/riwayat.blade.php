@extends('layouts.master')

@section('title','Riwayat Pembelian')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="/transaksi/mitra" class="btn btn-light">Beli</a>
        <a href="{{ url('/transaksi/riwayat') }}" class="btn btn-light active">Riwayat Pembelian</a>

        <div class="card mt-2">
          <div class="card-header">
            <div class="card-body table-responsive p-0 mt-2">
              <table class="table table-hover text-nowrap" style="text-align: center;">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Toko</th>
                    <th>Kedelai</th>
                    <th>Ragi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pesanan as $t)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>Toko {{ $t->transaksi['pengguna']['nama_lengkap'] }}</td>
                    <td>{{ $t->kedelai_beli }}</td>
                    <td>{{ $t->ragi_beli }}</td>
                    <td>Rp. {{ number_format($t->total_pembelian) }}</td>
                    <td>
                      @if($t->status == "Terverifikasi")
                      <span class="badge badge-success">{{ $t->status }}</span>
                      @else
                      <span class="badge badge-warning">{{ $t->status }}</span>
                      @endif
                    </td>
                    <td style="width: 10%;">
                      @if(!empty($t->bukti_pembayaran))
                      <a data-lightbox="image-1" href="{{ url('upload/bukti_pembayaran/') }}/{{ $t->bukti_pembayaran }}">
                        <img src="{{ url('upload/bukti_pembayaran/') }}/{{ $t->bukti_pembayaran }}" width="20%" class="rounded">
                      </a>
                      @else
                      <p>-</p>
                      @endif
                    </td>
                    <td>
                      @if(empty($t->bukti_pembayaran))
                      <button class="badge badge-info badge-sm">
                        <a href="{{ url('/transaksi/upload_bukti') }}/{{ $t->id }}"><i class="fa fa-upload" style="color: white;"></i></a>
                      </button>
                      <form action="{{ url('/transaksi/riwayat') }}/{{ $t->id }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="badge badge-danger badge-sm" onclick="return confirm('Anda yakin akan menghapus pesanan ini ?');">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>
                      @elseif(!empty($t->bukti_pembayaran) && $t->status == "Belum Diverifikasi")
                      <button class="badge badge-info badge-sm">
                        <a href="{{ url('/transaksi/upload_bukti') }}/{{ $t->id }}"><i class="fa fa-upload" style="color: white;"></i></a>
                      </button>
                      @else
                      
                      @endif
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-block col-12 mt-2">
              {{ $pesanan->links() }}
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
