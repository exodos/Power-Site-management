<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Management - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="{{route('home')}}" class="nav-link">Home</a>--}}
            {{--            </li>--}}
            <li class="nav-item d-none d-sm-inline-block">
                <img src="{{url('img/ethiologo.png')}}" alt="EthioTelecom Logo">
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
        {{--            <li class="nav-item dropdown">--}}
        {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--                    <i class="far fa-comments"></i>--}}
        {{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
        {{--                </a>--}}
        {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    Brad Diesel--}}
        {{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">Call me whenever you can...</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    John Pierce--}}
        {{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">I got your message bro</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    Nora Silvester--}}
        {{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">The subject goes here</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{--                    <i class="far fa-bell"></i>--}}
                    <i class="fas fa-user  mr-2"></i>
                    {{--                    <span class="badge navbar-badge"></span>--}}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">User Profile</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#ModalLoginForm">
                        <i class="fas fa-user-edit mr-2"></i>Details
                        {{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
                    </a>
                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" data-widget="fullscreen" href="#" role="button">--}}
            {{--                    <i class="fas fa-expand-arrows-alt"></i>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <a href="#" class="brand-link logo-switch">
                {{--            <img src="{{url('img/ethiologo.png')}}" alt="EthioTelecom Logo" class="brand-image-xs logo-xl" style="opacity: .8">--}}
                <span class="brand-text font-weight-bold">Site Management</span>
            </a>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-servicestack"></i>
                            <p>
                                Site Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('sites.index')}}" class="nav-link">
                                    <i class="fas fa-eye nav-icon"></i>
                                    <p>View Sites</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sites.create')}}" class="nav-link">
                                    <i class="fas fa-plus-square nav-icon"></i>
                                    <p>Add Site</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fas fa-tools nav-icon"></i>
                                    <p>Manage Site</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Device Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-fan"></i>
                                    <p>
                                        Air Conditioner
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('airconditioners.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Air Conditioner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('airconditioners.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Air Conditioner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Air Conditioner</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                    {{--                                            <p>Update Air Conditioner</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Air Conditioner</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-battery-full"></i>
                                    <p>
                                        Batteries
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('batteries.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Batteries</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('batteries.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Battery</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-plus-square nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Batteries</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                    {{--                                            <p>Update Batteries</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Batteries</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p>
                                        Power
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('powers.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Power</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('powers.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Power</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-plus-square nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Power</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                    {{--                                            <p>Update Power</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Power</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-charging-station"></i>
                                    <p>
                                        Rectifier
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('rectifiers.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Rectifiers</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('rectifiers.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Rectifier</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Rectifier</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Rectifier</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-solar-panel"></i>
                                    <p>
                                        Solar Panel
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('solarpanels.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Solar Panel</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('solarpanels.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Solar Panel</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Solar Panel</p>
                                        </a>
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Solar Panel</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-broadcast-tower"></i>
                                    <p>
                                        Tower
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('towers.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Tower</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('towers.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Tower</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Tower</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Tower</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fab fa-ups"></i>
                                    <p>
                                        Ups
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('ups.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Ups</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('ups.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Ups</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Ups</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Ups</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Work Order
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('workorders.index')}}" class="nav-link">
                                            <i class="fas fa-eye nav-icon"></i>
                                            <p>View Work Order</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('workorders.create')}}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add Work Order</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            {{--                                            <i class="fas fa-edit nav-icon"></i>--}}
                                            <i class="fas fa-tools nav-icon"></i>
                                            <p>Manage Work Order</p>
                                        </a>
                                    </li>
                                    {{--                                    <li class="nav-item">--}}
                                    {{--                                        <a href="#" class="nav-link">--}}
                                    {{--                                            <i class="fas fa-minus-circle nav-icon"></i>--}}
                                    {{--                                            <p>Delete Work Order</p>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </li>
                        </ul>
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
                        <h1 class="m-0">
                            @yield('dashboard-content')
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('sitemap')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        {{--            <div class="container-fluid">--}}
        @yield('content')
        {{--            </div>--}}
        <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="https://www.ethiotelecom.et/">EthioTelecom</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1
        </div>
    </footer>
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

@yield('scripts')


<div class="modal fade" id="ModalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <h1 class="card-img-top"><i class="fas fa-address-card fa-2x"></i></h1>

        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="defaultForm-email" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default">Login</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
