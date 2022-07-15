<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FPT Polytechnic')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{DIST_URL}}/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}/summernote/summernote-bs4.min.css">
</head>  
    <body class="sidebar-collapse">   
    <header>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- thanh menu trên bên phải-->
            <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ BASE_URL }}" class="nav-link">Trang chủ</a>
                </li>
            </ul>
            <!-- làm đăng xuất -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a onclick="return confirm('bạn có chắc muốn đăng xuất không?')" class="nav-link" href="{{ BASE_URL . 'logout' }}" role="button">
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </nav>  
    </header>
    <main class="content">
        @yield('content')
    </main>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Assignment 1-PHP 2 &copy; Hocdtph14606 </strong>
        <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{PLUGINS_URL}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{PLUGINS_URL}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{PLUGINS_URL}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{PLUGINS_URL}}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{PLUGINS_URL}}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{PLUGINS_URL}}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{PLUGINS_URL}}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{PLUGINS_URL}}/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{PLUGINS_URL}}/moment/moment.min.js"></script>
<script src="{{PLUGINS_URL}}/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{PLUGINS_URL}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{PLUGINS_URL}}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{PLUGINS_URL}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{DIST_URL}}/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{DIST_URL}}/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{DIST_URL}}/js/pages/dashboard.js"></script>
</body>
</html>