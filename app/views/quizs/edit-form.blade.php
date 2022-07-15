@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Quiz')
@section('content')   
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa quiz</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
                    <li class="breadcrumb-item active">Sửa quiz</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<form action="" method="post" id="demoForm">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary"> 
                    <div class="card-header">
                        <h3 class="card-title">Quiz</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" value="{{ $id }}" name="id" id="id">
                        <div class="form-group">
                            <label for="input">Tên quiz</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $name }}">
                        </div>
                        <div class="form-group">
                            <label for="input">Môn học</label>
                            <select name="subject_id" class="form-control">
                                <option value="{{ $subjects->id }}">{{ $subjects->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="input">Thời gian làm bài (phút)</label>
                            <input type="text" id="duration_minutes" name="duration_minutes" class="form-control" value="{{ $duration_minutes }}">
                        </div>
                        <div class="form-group">
                            <label for="input">Ngày bắt đầu</label>
                            <input type="datetime-local" id="start_time" name="start_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($start_time)) }}">
                        </div>
                        <div class="form-group">
                            <label for="input">Ngày kết thúc</label>
                            <input type="datetime-local" id="end_time" name="end_time" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($end_time)) }}">
                        </div>
                        <div class="form-group">
                            <label for="input">Trạng thái</label>
                            <div class="form-control" >
                                <label class="radio-inline"><input {{ !$status ? 'checked' : '' }} name="status" value="0" type="radio" checked> Ẩn </label>
                                <label class="radio-inline"><input {{ $status ? 'checked' : '' }} name="status" value="1" type="radio"> Hiện </label>
                        </div>
                        <div class="form-group">
                            <label for="input">Xáo trộn</label>
                            <div class="form-control" >
                                <label class="radio-inline"><input {{ !$is_shuffle ? 'checked' : '' }} name="is_shuffle" value="0" type="radio" checked> Có </label>
                                <label class="radio-inline"><input {{ $is_shuffle ? 'checked' : '' }} name="is_shuffle" value="1" type="radio"> Không </label>
                            </div>
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
@endsection