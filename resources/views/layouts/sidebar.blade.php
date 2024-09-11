<aside id="layout-menu" class="layout-menu menu-vertical menu  bg-primary">
  <div class="app-brand demo">
    <img src="{{ asset('assets/img/dppkum.jpg') }}" alt="logo-ppmt-banyuwangi" style="width: 200px; margin-bottom: 10px; border-radius: 0%;">
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">



    <li class="menu-item {{ Request::is('admin/dashboard') ? 'active open' : '' }}">
      <a href="/admin/dashboard" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Menu</span></li>

    <li class="menu-item {{ Request::is('admin/pasar') ? 'active' : '' }}">
      <a href="/admin/pasar" class="menu-link">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="Without menu">Input Data Pasar</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase "><span class="menu-header-text">Pasar</span></li>
    <li class="menu-item {{ Request::is('laporan/sampah') ? 'active' : '' }}">
      <a href="/admin/pasar" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-report"></i>
        <div data-i18n="Without menu">Data Pasar</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase "><span class="menu-header-text">Laporan</span></li>
    <li class="menu-item {{ Request::is('laporan/sampah') ? 'active' : '' }}">
      <a href="/laporan/sampah" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-report"></i>
        <div data-i18n="Without menu">Laporan</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase "><span class="menu-header-text">Developer</span></li>
    <li class="menu-item {{ Request::is('admin/developer') ? 'active' : '' }}">
      <a href="/admin/developer" class="menu-link">
        <div data-i18n="tabungan-sampah"><i class="fas fa-code"></i> Developer</div>
      </a>
    </li>
  </ul>
</aside>
