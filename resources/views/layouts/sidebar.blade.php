<aside id="layout-menu" class="layout-menu menu-vertical menu  bg-primary">
    <div style="display: flex; flex-direction: column; align-items: justify;">
        <img src=" {{ asset('assets/img/logo-dppkum.svg') }}" alt="logo-dppkum" style="margin-top: 15px; margin-left: 15px; border-radius: 0%;">
    </div>
    <!-- <div class="menu-inner-shadow"></div> -->
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

        <li class="menu-item {{ Request::is('admin/alamat') ? 'active' : '' }}">
            <a href="/admin/alamat" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div data-i18n="Without menu">Data Alamat</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/data_diri') ? 'active' : '' }}">
            <a href="/admin/data_diri" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Without menu">Data Diri</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/pedagang') ? 'active' : '' }}">
            <a href="/admin/pedagang" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Without menu">Data Pedagang</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/penarik_retribusi') ? 'active' : '' }}">
            <a href="/admin/penarik_retribusi" class="menu-link">

                <i class="menu-icon tf-icons bx bx-wallet"></i>
                <div data-i18n="Without menu">Data Penarik Retribusi</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('/admin/cetak-surat') ? 'active' : '' }}">
            <a href="cetak-surat" class="menu-link">

                <i class="menu-icon tf-icons bx bx-check-shield"></i>
                <div data-i18n="Without menu">Data Izin</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('admin/master-data') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <div data-i18n="Layouts" style="font-weight: bold; color:black;">Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('/admin/cetak-perpasar') ? 'active' : '' }}">
                    <a href="cetak-perpasar" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-printer"></i>
                        <div data-i18n="Without menu">Cetak Pasar</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('/admin/cetak-pedagang') ? 'active' : '' }}">
                    <a href="cetak-pedagang" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-printer"></i>
                        <div data-i18n="Without menu">Cetak Pedagang</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('/admin/cetak-lapak') ? 'active' : '' }}">
                    <a href="cetak-lapak" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-printer"></i>
                        <div data-i18n="Without menu">Cetak Lapak</div>
                    </a>
                </li>
                {{-- <li class="menu-item {{ Request::is('/admin/cetak-surat') ? 'active' : '' }}">
                <a href="cetak-surat" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-printer"></i>
                    <div data-i18n="Without menu">Cetak Surat</div>
                </a>
        </li> --}}

    </ul>
    </li>
    </ul>
</aside>
