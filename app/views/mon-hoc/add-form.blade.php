@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Thêm môn học')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm môn học</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . 'mon-hoc' ?>">Môn học</a></li>
                    <li class="breadcrumb-item active">Thêm logo</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="" method="post" id="demoForm">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-title">
                        <label for="input">
                                @if (isset($message)) {
                                    <h6 style='color:red; margin-left: 20px;'>$message</h6>;
                                @endif
                        </label>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Logo</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input">Tên môn</label>
                            <input type="text" id="name" name="name" class="form-control">
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
                <button type="submit" class="btn btn-success">Thêm mới</button>
            </div>
        </div>
    </div>
    <!-- /.content -->
</form>
</div>
@endsection