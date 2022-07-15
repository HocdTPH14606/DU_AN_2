<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN H&T</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- logo hiện khi vào trang -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="brand-image img-circle elevation-3" src="dist/img/logo3.jpg" alt="AdminLTELogo" height="100" width="100">
        </div> -->

        <!-- thanh menu + đăng xuất bên phải + trên -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- thanh menu trên bên phải-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= BASE_URL ?>" class="nav-link">Trang chủ</a>
                </li>
            </ul> 
            <!-- làm đăng xuất -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a onclick="return confirm('bạn có chắc muốn đăng xuất không?')" class="nav-link" href="<?=BASE_URL.'logout'?>" role="button">
                       Đăng xuất
                    </a> 
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <?php if ($_SESSION["role_id"] == 1) { ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../images/logo/logo3.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Quiz Fpoly</span>
            </a> 
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
                    <div class="info">
                        <p style="color: white; font-size: 18px;">Xin chào</p>
                        <a href="#" class="d-block"><?= $_SESSION['name'] ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                        <!-- quản lý tài khoản -->
                        <li class="nav-item">
                            <a href="<?= BASE_URL . 'mon-hoc'?>" class="nav-link">
                                <i class="nav-icon fas fa-comment-alt"></i>
                                <p>Môn học</p>
                            </a>
                        </li>
                         <li class="nav-item">
                                    <a href="<?= BASE_URL . 'user/quan-ly' ?>" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            Quản lý thống kê
                                        </p>
                                    </a>
                                </li>
                        <!-- quản lý thống kê -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php } else {
            header("location:" .BASE_URL);
            die;
        }  ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sửa quiz</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="<?= BASE_URL . 'quiz?subject_id=' . $quiz->subject_id ?>">Danh sách</a></li> -->
                                <li class="breadcrumb-item active">Sửa quiz</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <form action="<?= BASE_URL . 'answer/luu-cap-nhat?id=' . $answer->id?>" method="post" id="demoForm" enctype="multipart/form-data">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary"> 
                                <div class="card-header">
                                    <h3 class="card-title">question</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="form-group">
                                        <label for="input">Câu hỏi</label>
                                        <select name="question_id" class="form-control">
                                            <option value="<?= $question->id ?>"><?= $question->name ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="input">Câu trả lời</label>
                                        <input type="text" id="content" name="content" class="form-control" value="<?= $answer->content ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="input">Kết quả</label>
                                        <div class="form-control">
                                            <label class="radio-inline"><input <?= !$answer->is_correct ? 'checked' : '' ?> name="is_correct" value="0" type="radio" checked> Sai </label>
                                            <label class="radio-inline"><input <?= $answer->is_correct ? 'checked' : '' ?>  name="is_correct" value="1" type="radio"> Đúng </label>
                                        </div>
                                    </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </form>
        </div>
        <!-- Content Wrapper. Contains page content nội dung-->

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Assignment 1-PHP 2 &copy; Hocdtph14606 </strong>
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>