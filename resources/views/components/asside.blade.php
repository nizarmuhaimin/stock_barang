<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">Yunta</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">St</a>
    </div>
    <ul class="sidebar-menu">
        @if (Auth::check() && Auth::user()->role == 'admin')
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Article</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
        @endif
        <li class="active"><a class="nav-link" href="/"><i class="fas fa-home"></i>
                <span>Dashboard</span></a></li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                <span>Article</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/article">All Data</a></li>
                <li><a class="nav-link" href="/admin/article/create">Create Data</a></li>
            </ul>
        </li>

    </ul>

</aside>