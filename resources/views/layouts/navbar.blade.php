<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <!-- <a href="#" class="nav-link">Home</a> -->
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <!-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> -->


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    @if(auth()->user()->level == 'supplier')
    <li class="nav-item dropdown">
      <?php
          $transaksi  = \App\Transaksi::where('pengguna_id', Auth::user()->id)->first();
          $pesanan = \App\Pesanan::where('transaksi_id', $transaksi['id'])->where('status', "Belum Diverifikasi")->get();

          if (!empty($pesanan)) 
          {
              $notif         = $pesanan->count();
          }
          
      ?>
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if(!empty($notif))
        <span class="badge badge-danger navbar-badge">{{ $notif }}</span>
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">Pesanan</span>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item">
          @if(!empty($notif))
          <i class="fas fa-envelope mr-2"></i>{{ $notif }} Pesanan Baru
          @else
          <i class="fas fa-envelope mr-2"></i>Tidak ada pesanan
          @endif
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ url('/transaksi/pesanan') }}" class="dropdown-item dropdown-footer">Lihat Pesanan</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    @endif
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
  </ul>
</nav>
