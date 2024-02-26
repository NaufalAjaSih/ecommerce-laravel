<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Produk</li>
            <li class="nav-item dropdown {{ $type_menu === 'product' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('product/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('product/create') }}">Tambah Produk</a>
                    </li>
                    <li class="{{ Request::is('product') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('product') }}">Daftar Produk</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>Blank
                        Page</span></a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Contact Support
            </a>
        </div>
    </aside>
</div>
