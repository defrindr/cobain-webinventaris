
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Admin Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/bootstrap4/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    {{-- <link rel="stylesheet" href="/css/pagination.css"> --}}
    <!-- Morris.css -->
    <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
    <!-- Costum -->
    <style>
        .main-header .navbar-custom-menu,.main-header .navbar-right {
            padding-right: 2rem !important;
        }

        .navbar {
            padding: 0 !important;
        }


        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9{
            padding: 2px 15px !important;
        }
        a{
            cursor: pointer;
        }
        .small-box>.small-box-footer{
            min-height: 20px;
        }
    </style>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

    @include('layouts.header')
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="body">
        <section class="content-header">
            <h1>
                @yield('head')
                <small>@yield('desc')</small>
            </h1>
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </section>
        <section class="content container-fluid">
            @yield('content')
        </section>
        <!-- content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')

</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="/bootstrap4/js/bootstrap.min.js"></script>
<!-- JQuery UI -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Morris.js -->
<script src="/bower_components/raphael/raphael.min.js"></script>
<script src="/bower_components/morris.js/morris.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
{{-- custom --}}
<script src="/js/ajax.js"></script>
</body>
</html>
