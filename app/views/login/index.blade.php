<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{PLUGINS_URL}}summernote/summernote-bs4.min.css">
</head>

<body>
    <div class="row" style="background: #ee4d2d; padding: 15px 0 10px 0; margin: 0;">
        <div class="input col-sm-1"></div>
        <div class="row col-sm-8">
            <div class="col-sm-2">
                <a href="trang-chinh/index.php">
                    <img class="img-rounded" src="images/logo/logo3.jpg" alt="Logo" width="60px" height="60px" style="margin-bottom: 10px;margin-left: 25px">
                </a>
            </div>
            <div>
                <ul class="nav navbar-nav" style="height: 40px; margin-top: 5px; color:white;">
                    <a href="#" style="color:white; margin-left: 2px; font-size: 36px;">Login</a>
                </ul>
            </div>
        </div>
        <div class="input col-sm-2">
            <ul class="nav navbar-nav" style="height: 40px; margin-top: 20px; color:white;">
                <a href="#" style="color:white; margin-right: 2px;"> B???n c???n tr??? gi??p ? </a>
            </ul>
        </div>
    </div>
    <div class="hold-transition login-page">
        <form action="" method="post">
            <div class="login-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <b>????ng nh???p</b>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">  
                        @if (isset($_SESSION["er_email"]))
                            {{ $_SESSION["er_email"]}};
                        @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"> 
                            @if (isset($_SESSION["er_pas"] ))
                            {{ $_SESSION["er_pas"] }};
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <input name="ghi_nho" type="checkbox" checked> Ghi nh??? t??i kho???n?
                            </div>
                        </div>
                        <div class="social-auth-links text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">????ng nh???p</button>
                        </div>
                        <div class="form-group">
                            <a href="tai-khoan/quen-mk.php"><small>Qu??n m???t kh???u?</small></a>
                            <div><small>Kh??ng c?? t??i kho???n?</small> <a href="tai-khoan/dang-ky.php"><small>????ng k??.</small></a></div> ????
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </form>
    </div>
</body>

</html>