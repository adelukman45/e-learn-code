<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Learn <sup>Code</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    <div class="sidebar-heading">
        Users
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item {{ Request::is('dashboard/courses*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/courses">
            <i class="fas fa-fw fa-book"></i>
            <span>My Courses</span></a>
    </li> --}}
    <li class="nav-item {{ Request::is('dashboard/courses*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="/dashboard/courses" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>My Courses</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">My Courses:</h6>
                <a class="collapse-item" href="/dashboard/courses/html">HTML</a>
                <a class="collapse-item" href="/dashboard/courses/css">CSS</a>
                <a class="collapse-item" href="/dashboard/courses/php">PHP</a>
                <a class="collapse-item" href="/dashboard/courses/mobile">Mobile</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
