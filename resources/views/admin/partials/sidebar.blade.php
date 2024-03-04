<div class="sidebar-brand">
    <a href="{{ route('admin.home.index') }}">Mega Mall</a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('admin.home.index') }}">M-M</a>
</div>
<ul class="sidebar-menu">
    <li class="dropdown active">
        <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Home</span></a>
    </li>

    @if(Auth::user()->hasRole(['super-admin','admin']))
        <li class="menu-header">Management Pages</li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Permissions</span></a>
            <ul class="dropdown-menu" style="display: none;">
                <li><a class="nav-link" href="{{ route('admin.permissions.index') }}">List Of Permissions</a></li>
                @if(Auth::user()->hasRole('super-admin'))
                    <li><a class="nav-link" href="{{ route('admin.permissions.create') }}">Add New Permission</a></li>
                @endif
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Roles</span></a>
            <ul class="dropdown-menu" style="display: none;">
                <li><a class="nav-link" href="{{ route('admin.roles.index') }}">List Of Roles</a></li>
                @if(Auth::user()->hasRole('super-admin'))
                    <li><a class="nav-link" href="{{ route('admin.roles.create') }}">Add New Role</a></li>
                @endif
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Users</span></a>
            <ul class="dropdown-menu" style="display: none;">
                <li><a class="nav-link" href="{{ route('admin.users.index') }}">List Of Users</a></li>
                <li><a class="nav-link" href="{{ route('admin.users.create') }}">Add New User</a></li>
            </ul>
        </li>

    @endif
    <li class="menu-header">Content Pages</li>
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Categories</span></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a class="nav-link" href="{{ route('admin.categories.index') }}">List Of Categories</a></li>
            <li><a class="nav-link" href="{{ route('admin.categories.create') }}">Add New Category</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Products</span></a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a class="nav-link" href="{{ route('admin.products.index') }}">List Of Products</a></li>
            <li><a class="nav-link" href="{{ route('admin.products.create') }}">Add New Product</a></li>
        </ul>
    </li>
</ul>
