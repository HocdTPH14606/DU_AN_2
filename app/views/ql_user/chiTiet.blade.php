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
                        <li class="breadcrumb-item"><a href="{{ BASE_URL . 'user/quan-ly' }}">quản lý</a></li>
                        <li class="breadcrumb-item active">Chi tiết</li>
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
                <th>Sinh viên</th>
                <th>Câu hỏi</th>
                <th>Đáp án chọn</th>
            </thead>
            <tbody>
                @foreach ($StudentQuizDetail as $sub)
                    <tr> 
                        <td>{{ $sub->student_quiz_id  }}</td>
                        <td>{{ $sub->question_id  }}</td>
                        <td>{{ $sub->answer_id  }}</td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection