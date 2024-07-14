<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.index') }}">Admin Stunting</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.index') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li class="{{ Request::routeIs('admin.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class="{{ Request::routeIs('gejala.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('gejala.index') }}">
                        <i class="fas fa-chart-bar"></i> <span>Gejala</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('users.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fas fa-user"></i> <span>Data Kader Dan Admin</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
