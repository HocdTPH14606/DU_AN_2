@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Thêm câu hỏi')
@section('content') 
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm câu hỏi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ BASE_URL . 'mon-hoc' }}">Môn học</a></li> 
                <li class="breadcrumb-item"><a href="{{ BASE_URL . 'question?quiz_id=' . $quiz->id }}">Câu hỏi</a></li> 
                    <li class="breadcrumb-item active">Thêm câu hỏi</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<form action="" method="post" id="demoForm" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="input">Câu hỏi</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input">Quiz</label>
                            <select name="quiz_id" class="form-control"> 
                                <option value="{{ $quiz->id }}">{{ $quiz->name }}</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="input">Câu trả lời A</label>
                            <input type="text" id="answerA" name="answerA" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input">Câu trả lời B</label>
                            <input type="text" id="answerB" name="answerB" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input">Câu trả lời C</label>
                            <input type="text" id="answerC" name="answerC" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input">Câu trả lời D</label>
                            <input type="text" id="answerD" name="answerD" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input">Image</label>
                            <input type="file" id="img" name="img" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="input">Kết quả</label>
                            <select name="correct" class="form-control">
                                <option value="1">Đáp án A</option>
                                <option value="2">Đáp án B</option>
                                <option value="3">Đáp án C</option>
                                <option value="4">Đáp án D</option>
                            </select>
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
    </section>
    <!-- /.content -->
</form>
@endsection