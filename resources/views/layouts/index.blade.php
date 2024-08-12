<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>X Tech | @yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
<!-- Toaste -->
<link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css" rel="stylesheet">

@yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{trans('dashboard_trans.language')}}
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach


                      <!-- End Level two -->
                    </ul>
                  </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                {{-- selector language --}}
                {{-- <div class="form-group">
                    <select class="form-control guards" id="language-switcher">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                {{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'selected' : '' }}>
                                {{ $properties['native'] }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('cms/image/Artboard 1-8 (2).png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">X tech</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('cms/image/ahmed.jpg ') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name ?? 'User Name' }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Starter Pages

                                </p>
                            </a>
                            {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>







                        <li class="nav-header __web-inspector-hide-shortcut__">Content Management </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('home.index') || request()->routeIs('home.create')) active @endif">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('home.create') }}" class="nav-link @if (request()->routeIs('home.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.index') }}" class="nav-link @if (request()->routeIs('home.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('about.index') || request()->routeIs('about.create') || request()->routeIs('create.card'))) active @endif">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    About Us
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('about.create') }}" class="nav-link @if (request()->routeIs('about.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about.index') }}" class="nav-link @if (request()->routeIs('about.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('services.index') || request()->routeIs('services.create')) active @endif">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                     Services
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('services.create') }}" class="nav-link @if (request()->routeIs('services.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('services.index') }}" class="nav-link @if (request()->routeIs('services.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('features.index') || request()->routeIs('features.create')) active @endif">
                                <i class="nav-icon fas fa-rocket"></i>
                                <p>
                                    Features
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('features.create') }}" class="nav-link @if (request()->routeIs('features.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('features.index') }}" class="nav-link @if (request()->routeIs('features.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('teams.index') || request()->routeIs('teams.create')) active @endif">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                     Teams
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('teams.create') }}" class="nav-link @if (request()->routeIs('teams.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teams.index') }}" class="nav-link @if (request()->routeIs('teams.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-header __web-inspector-hide-shortcut__">Admin & Users</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('admins.index') || request()->routeIs('admins.create')) active @endif">
                                <i class="nav-icon fas fa-user-tie" {{-- style="color: #007bff" --}}></i>
                                <p>
                                    Admins
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admins.create') }}"
                                        class="nav-link @if (request()->routeIs('admins.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admins.index') }}" class="nav-link @if (request()->routeIs('admins.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('users.index') || request()->routeIs('users.create')) active @endif">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link @if (request()->routeIs('users.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link @if (request()->routeIs('users.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-header __web-inspector-hide-shortcut__">Roles & Permission </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('roles.index') || request()->routeIs('roles.create')) active @endif">
                                <i class="nav-icon fas fa-user-tag"></i>
                                <p>
                                    Role
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('roles.create') }}" class="nav-link @if (request()->routeIs('roles.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link @if (request()->routeIs('roles.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link @if (request()->routeIs('permissions.index') || request()->routeIs('permissions.create')) active @endif">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Permission
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('permissions.create') }}" class="nav-link @if (request()->routeIs('permissions.create')) active @endif">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link @if (request()->routeIs('permissions.index')) active @endif">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-header __web-inspector-hide-shortcut__">Settings </li>

                        <li class="nav-item">
                            <a href="{{ route('edit-password') }}" class="nav-link @if (request()->routeIs('edit-password')) active @endif">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>
                                    Change Password

                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{ route('update-profile') }}" class="nav-link @if (request()->routeIs('update-profile')) active @endif">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Update Profile

                                </p>
                            </a>

                        </li>


                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout

                                </p>
                            </a>

                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('main-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="@yield('home-url')">@yield('breadcrumb-title','Home') </a></li>
                                <li class="breadcrumb-item active">@yield('subtitle')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
                <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span></div>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Vresion : {{ env('App_Vresion') }}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{ now()->year }} <a href="#">{{ env('APP_NAME') }}</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    {{-- Sweetalert --}}
    <script src="{{ asset('cms/js/sweetalert.js') }}"></script>
    {{-- axios --}}
    <script src="{{ asset('cms/js/axios.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    <!-- Toastr -->
    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>


<script>
    document.getElementById('language-switcher').addEventListener('change', function() {
        window.location.href = this.value;
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    @yield('js')
</body>

</html>
