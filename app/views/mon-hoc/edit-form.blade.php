@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Cập nhật môn học ')
@section('content') 

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update môn học</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . 'mon-hoc'?>">Môn học</a></li>
                    <li class="breadcrumb-item active">Thêm logo</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content --> 
    <form action="" method="post">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-title">
                        <label for="input"> 
                                @if (isset($message))
                                    <h6 style='color:red; margin-left: 20px;'>$message</h6>;
                                @endif
                        </label>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Môn học</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input">Tên môn</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $name }}">
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
                <button type="submit" class="btn btn-success" >Update</button>
            </div>
        </div>
    </section>
    <!-- /.content -->
</form> 
@endsection