<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/">Stock Management</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">SM</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">MAIN MENU</li>
        @if (Auth::check() && (Auth::user()->role == 'staff' || Auth::user()->role == 'admin'))
            <li
                class="{{ (Str::startsWith(Request::path(), 'dashboard') ? 'active' : '' || Str::startsWith(Request::path(), '/')) ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item dropdown {{ Str::startsWith(Request::path(), 'stock') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i>
                    <span>Stock</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Str::startsWith(Request::path(), 'stockin') ? 'active' : '' }}"><a class="nav-link"
                            href="/stockin">Stock In</a></li>
                    <li class="{{ Str::startsWith(Request::path(), 'stockout') ? 'active' : '' }}"><a class="nav-link"
                            href="/stockout">Stock Out</a></li>
                </ul>
            </li>
        @endif

        @if (Auth::check() && Auth::user()->role == 'admin')
            <li class="menu-header">ADMIN SECTION</li>
            <li class="{{ Str::startsWith(Request::path(), 'manage-staff') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.manajemen.staff') }}"><i class="fas fa-user"></i>
                    <span>Manage Staff</span></a></li>

            <!-- Dropdown menu for Items and Categories -->
            <li class="nav-item dropdown {{ Str::startsWith(Request::path(), 'items') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cube"></i>
                    <span>Items</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Str::startsWith(Request::path(), 'items/manage-items') ? 'active' : '' }}"><a
                            class="nav-link" href="{{ route('admin.tampil_item') }}">
                            <span>Manage Items</span></a></li>
                    <li class="{{ Str::startsWith(Request::path(), 'items/manage-categories') ? 'active' : '' }}"><a
                            class="nav-link" href="{{ route('admin.tampilkategori') }}">
                            <span>Manage Categories</span></a></li>
                </ul>
            </li>
            <!-- End of Dropdown menu -->
            <li class="{{ Str::startsWith(Request::path(), 'supplier') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.tampil_supplier') }}"><i class="far fa-user"></i>
                    <span>Manage Supplier</span></a></li>
        @endif

    </ul>
</aside>
