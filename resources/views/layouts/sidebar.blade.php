<aside id="layout-menu" class="layout-menu menu-vertical menu  bg-primary">
  <div class="app-brand demo">
    <img src="{{ asset('assets/img/dppkum.jpg') }}" alt="logo-ppmt-banyuwangi" style="width: 200px; margin-bottom: 10px; border-radius: 0%;">
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">

    <li class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
      <a href="/admin/dashboard" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Menu</span></li>

    <li class="menu-item {{ Request::is('admin/pasar') ? 'active' : '' }}">
      <a href="/admin/pasar" class="menu-link">
        <i class="menu-icon tf-icons bx bx-buildings"></i>
        <div data-i18n="Without menu">Data Pasar</div>
      </a>
    </li>

    <li class="menu-item {{ Request::is('admin/lapak') ? 'active' : '' }}">
      <a href="/admin/lapak" class="menu-link">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Without menu">Data Lapak</div>
      </a>
    </li>

    <li class="menu-item {{ Request::is('admin/pedagang') ? 'active' : '' }}">
      <a href="/admin/pedagang" class="menu-link">
        <i class="menu-icon tf-icons bx bx-group"></i>
        <div data-i18n="Without menu">Data Pedagang</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase "><span class="menu-header-text">Sub Admin</span></li>

    <li class="menu-item {{ Request::is('admin/master-data') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Sub Data</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('admin/penarik_retribusi') ? 'active' : '' }}">
          <a href="/admin/penarik_retribusi" class="menu-link">

            <i class="menu-icon tf-icons bx bx-wallet"></i>
            <div data-i18n="Without menu">Data Penarik Retribusi</div>
          </a>
        </li>

        <li class="menu-item {{ Request::is('admin/izin') ? 'active' : '' }}">
          <a href="/admin/izin" class="menu-link">

            {{-- <i class="menu-icon tf-icons bx bx-file"></i> --}}
            <i class="menu-icon tf-icons bx bx-check-shield"></i>
            <div data-i18n="Without menu">Data Izin</div>
          </a>
        </li>

        <li class="menu-item {{ Request::is('admin/data_diri') ? 'active' : '' }}">
          <a href="/admin/data_diri" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Without menu">Data Diri</div>
          </a>
        </li>

        <li class="menu-item {{ Request::is('admin/alamat') ? 'active' : '' }}">
          <a href="/admin/alamat" class="menu-link">
            <i class="menu-icon tf-icons bx bx-map"></i>
            <div data-i18n="Without menu">Data Alamat</div>
          </a>
        </li>
      </ul>
    </li>

    {{-- <li class="menu-header small text-uppercase "><span class="menu-header-text">Developer</span></li>
    <li class="menu-item {{ Request::is('admin/developer') ? 'active' : '' }}">
      <a href="/admin/developer" class="menu-link">
        <div data-i18n="tabungan-sampah"><i class="fas fa-code"></i> Developer</div>
      </a>
    </li> --}}
  </ul>
</aside>
