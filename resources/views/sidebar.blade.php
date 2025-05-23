<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 text-sm text-dark">AYO-BUGAR</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark {{ request()->routeIs('dashboard.*') ? ' active' : '' }}" href="/">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ request()->routeIs('transaction.*') ? ' active' : '' }}" href="{{ route('transaction.index')}}">
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ request()->routeIs('clockin') ? ' active' : '' }}" href="{{ route('clockin')}}">
            <span class="nav-link-text ms-1">Checkin GYM</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ request()->routeIs('laporan.kehadiran') ? ' active' : '' }}" href="{{ route('laporan.kehadiran')}}">
            <span class="nav-link-text ms-1">Laporan Kehadiran</span>
          </a>
        </li>
      </ul>
    </div>
    </div>
  </aside>