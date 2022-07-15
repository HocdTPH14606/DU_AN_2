@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Quiz')
@section('content')  
    <div class="card">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ BASE_URL . 'quiz' }}">Danh sách</a></li>
                            <li class="breadcrumb-item active">Sửa quiz</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> 
        <div class="card-body table-responsive p-0" style="height: 600px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <th>STT</th>
                    <th>Quiz</th>
                    <th>Môn học</th>
                    <th>Thời gian làm bài</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    
                    <th>Làm quiz</th>
                    {{-- <th>Điểm</th> --}}
                    
                    @if($_SESSION["auth"]["role_id"] == 1)
                    <th>Xáo trộn</th>
                    <th>Trạng thái</th>
                    <th>Câu hỏi</th>
                    <th><a href="{{ BASE_URL . 'quizs/add?subject_id=' .$subject_id }}">Tạo mới</a></th> 
                    @else 
                    @endif 
                </thead>
                <tbody>
                    @foreach ($quiz as $sub)
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td>{{ $sub->name }}</td>
                            <td>{{ $subjects->name }}</td>
                            <td>{{ $sub->duration_minutes }} phút</td>
                            <td>{{ $sub->start_time }}</td>
                            <td>{{ $sub->end_time }}</td> 
                                <th><a href="{{ BASE_URL . 'quizs/start?id=' . $sub->id.'&subject_id='.$sub->subject_id }}" class="btn btn-default">Bắt đầu</a></th>
                                {{-- <th>{{ $StudentQuiz->score }}</th> --}}
                                @if($_SESSION["auth"]["role_id"] == 1)
                                @if ($sub->is_shuffle == 1) 
                                <td>Không</td>
                            @else
                                <td>Có</td>
                            @endif
                            @if ($sub->status == 1)
                                <td>Hiện</td>
                            @else
                                <td>Ẩn</td>
                            @endif
                                <td>
                                    <a href="{{ BASE_URL . 'question?quiz_id=' . $sub->id }}" class="btn btn-default">Ds câu hỏi</a>
                                </td>
                            @else 
                            @endif
                            @if($_SESSION["auth"]["role_id"] == 1)
                            <td>
                                <a href="{{ BASE_URL . 'quizs/edit/' . $sub->id }}" class="btn btn-default">Sửa</a>
                                <a onclick="return confirm('bạn có chắc muốn xóa không?')" href="{{ BASE_URL . 'quizs/xoa?id=' . $sub->id . '&subject_id=' . $sub->subject_id }}" class="btn btn-default">Xóa</a>
                            </td>
                            @else 
                            @endif
                                    
                                </tr> 
                            @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@endsection