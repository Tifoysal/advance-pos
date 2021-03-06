<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>



@if(getPermissions(auth()->user()->role_id,'users.index'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">Users</a>
    </li>
@endif


    @if(getPermissions(auth()->user()->role_id,'role.list'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('role.list')}}">Roles</a>
    </li>
    @endif

    @if(getPermissions(auth()->user()->role_id,'permission.index'))
        <li class="nav-item">
        <a class="nav-link" href="{{route('permission.index')}}">Permissions</a>
    </li>
    @endif

    @if(getPermissions(auth()->user()->role_id,'category.list'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('category.list')}}">
            {{-- <span data-feather="layers"></span> --}}
            Category
        </a>
    </li>
    @endif


    @if(getPermissions(auth()->user()->role_id,'product.list'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('product.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Product</span></a>
    </li>
    @endif



</ul>
<!-- End of Sidebar -->
