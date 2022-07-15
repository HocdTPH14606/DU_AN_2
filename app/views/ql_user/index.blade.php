@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Start quiz')
@section('content') 
<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ BASE_URL . 'mon-hoc' }}">Môn học</a></li>
                        <li class="breadcrumb-item active">Câu hỏi</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 600px;">
        <table class="table table-head-fixed text-nowrap">
            <thead>
                <th>STT</th>
                <th>Sinh viên</th>
                <th>Quiz</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Điểm</th>
                <th>Chi tiết</th>
            </thead>
            <tbody>
                @foreach ($StudentQuiz as $sub)
                    <tr>
                        <td>{{ $sub->id }}</td>
                        <td>{{ $sub->student_id}}</td>
                        <td>{{ $sub->quiz_id }}</td>
                        <td>{{ $sub->start_time }}</td>
                        <td>{{ $sub->end_time }}</td>
                        <td>{{ $sub->score }}</td> 
                        <td>
                        <a href="{{ BASE_URL . 'ql_user/chiTiet/' .$sub->student_id }}"  class="btn btn-primary">Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection