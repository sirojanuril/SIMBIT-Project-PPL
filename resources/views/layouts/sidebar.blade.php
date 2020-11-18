<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIMBIT</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{auth()->user()->getAvatar()}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @if(auth()->user()->level == 'mitra')
        <a href="/profilmitra" class="d-block">{{auth()->user()->nama_lengkap}}</a>
        @elseif(auth()->user()->level == 'supplier')
        <a href="/profilsupplier" class="d-block">{{auth()->user()->nama_lengkap}}</a>
        @endif
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
           <a href="{{route('dashboard')}}" class="nav-link ">
             <i class="nav-icon fas fa-columns"></i>
             <p>
               dashboard
             </p>
           </a>
        </li>
        @if(auth()->user()->level == 'mitra')
        <li class="nav-item">
           <a href="/datasupplier" class="nav-link ">
             <i class="nav-icon fas fas fa-book"></i>
             <p>
               Data Supplier
             </p>
           </a>
        </li>
        @endif
        @if(auth()->user()->level == 'mitra')
        <li class="nav-item">
           <a href="/produksi" class="nav-link ">
             <i class="nav-icon fas fas fa-store"></i>
             <p>
               Manajemen Produksi
             </p>
           </a>
        </li>
        @endif
        @if(auth()->user()->level == 'mitra')
        <li class="nav-item">
           <a href="/keuangan/hitung" class="nav-link ">
              <i class="nav-icon fas fa-credit-card"></i>             
              <p>
               Manajemen Keuangan
             </p>
           </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
