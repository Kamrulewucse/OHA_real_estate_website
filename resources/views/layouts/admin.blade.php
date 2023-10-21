<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" >

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/backend/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('themes/backend/css/skins/_all-skins.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('style')
    <style>
        .img-thumbnail {
            background-color: #fff !important;
        }
        .block__list {
            padding: 0;
            width: 100%;
        }
        .block__list li {
            width: 9.8%;
            list-style: none;
            cursor: move;
        }
        @media (max-width: 767px) {
            .block__list li {
                width: 49%;
            }
        }
        .block__list_tags li {
            display: inline-block;
            text-align: center;
        }
        .btnRemoveImage {
            color: red !important;
            cursor: pointer !important;
        }

        .block__list img {
            height: 100px;
        }
        .swal2-popup {
            font-size: 1.6rem !important;
        }
        .box {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            margin-bottom: 1rem;
        }
        .box {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 0.25rem;
        }
        .box{
            border-top: 3px solid #ffffff;
        }

        .box-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 0 solid rgba(0,0,0,.125);
        }
        .box-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0,0,0,.125);
            padding: 0.75rem 1.25rem;
            position: relative;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }
        .box-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }
        .box-footer {
            padding: 0.75rem 1.25rem;
            background-color: rgba(0,0,0,.03);
            border-top: 0 solid rgba(0,0,0,.125);
        }

        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
            background-color: #3c8dbc;
            border-color: #3c8dbc;
        }
        .box.box-info {
            border-top-color: rgb(60, 141, 188);
        }
        .datepicker table tr td.active.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled.disabled, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover.active, .datepicker table tr td.active.disabled:hover.disabled, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active.disabled:hover[disabled], .datepicker table tr td.active.disabled[disabled], .datepicker table tr td.active:active, .datepicker table tr td.active:hover, .datepicker table tr td.active:hover.active, .datepicker table tr td.active:hover.disabled, .datepicker table tr td.active:hover:active, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active:hover[disabled], .datepicker table tr td.active[disabled] {
            background-color: #3c8dbc !important;
            color: #fff !important;
        }
        a, a:hover {
            color: #3c8dbc;
        }
        .select2{
            width: 100% !important;
        }
        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
            background-color: #3c8dbc;
        }
    </style>
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>AP</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin </b>Panel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <h4 class="pull-left" style="color: white; margin-top: 11px; padding-left: 20px">{{ config('app.name') }}
                <small><a class="btn btn-info btn-sm text-white" target="_blank" href="{{ route('home') }}">View Website</a></small></h4>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/avatar.png') }}" class="user-image" alt="Avatar">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.password_change') }}" class="btn btn-default btn-flat">Password Change</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign Out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Main Navigation</li>

                <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard text-white"></i> <span>Dashboard</span></a>
                </li>

                <?php
                $subMenu = ['admin.about_us','admin.about_us.add','admin.about_us.edit'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.about_us') }}"><i class="fa fa-newspaper-o text-white"></i> <span>About Us</span></a>
                </li>

                <?php
                $subMenu = ['admin.client_query'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.client_query') }}"><i class="nav-icon fa fa-users"></i> <span>Client Query</span></a>
                </li>

                <?php
                    $subMenu = [
                        'admin.add_project', 'admin.project', 'admin.edit_project','admin.project_category',
                        'admin.project_category.add', 'admin.project_category.edit','admin.project_category',
                        'admin.project_category.add', 'admin.project_category.edit'
                    ];
                ?>
                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-tasks text-white"></i> <span>Project Manage</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <?php
                            $subSubMenu = ['admin.project_category', 'admin.project_category.add', 'admin.project_category.edit'];
                        ?>
                        <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <a href="{{ route('admin.project_category') }}"><i class="fa fa-circle-o"></i> Category</a>
                        </li>
                        <?php
                            $subSubMenu = ['admin.add_project', 'admin.project', 'admin.edit_project'];
                        ?>
                        <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                            <a href="{{ route('admin.project') }}"><i class="fa fa-circle-o"></i> Project</a>
                        </li>
                    </ul>
                </li>

                <?php
                    $subMenu = ['admin.add_portfolio', 'admin.portfolio', 'admin.edit_portfolio'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.portfolio') }}"><i class="fa fa-newspaper-o text-white"></i> <span>Portfolio</span></a>
                </li>
                <?php
                $subMenu = ['admin.service','admin.service.create','admin.service.edit'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.service') }}"><i class="fa fa-tasks text-white"></i> <span>Service</span></a>
                </li>
                <?php
                $subMenu = ['admin.testimonial','admin.testimonial.create','admin.testimonial.edit'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonial') }}"><i class="fa fa-comment text-white"></i> <span>Testimonial</span></a>
                </li>
                <?php
                    $subMenu = [
                        'admin.about_principal','admin.about_principal.add','admin.about_principal.edit',
                        'admin.team','admin.member_add','admin.team_edit','admin.team_heading','admin.team_heading_add',
                        'admin.team_heading_edit',
                    ];
                ?>

                 <?php
                $subMenu = ['admin.team','admin.member_add','admin.team_edit'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.team') }}"><i class="fa fa-image text-white"></i> <span>Team Member</span></a>
                </li>
                <?php
                $subMenu = ['admin.slider','admin.slider.add','admin.slider.edit'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.slider') }}"><i class="fa fa-image text-white"></i> <span>Slider</span></a>
                </li>
                <?php
                    $subMenu = ['admin.news','admin.news.add','admin.news.edit'];
                ?>
                <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="{{ route('admin.news') }}"><i class="fa fa-newspaper-o text-white"></i> <span>News</span></a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('themes/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('themes/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('themes/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('themes/backend/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Sortable -->
<script src="{{ asset('themes/backend/plugins/sortable/Sortable.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('themes/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('themes/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('themes/backend/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('themes/backend/js/sweetalert2@9.js') }}"></script><script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.date-picker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

@yield('script')
<!-- AdminLTE App -->
<script src="{{ asset('themes/backend/js/adminlte.min.js') }}"></script>
</body>
</html>
