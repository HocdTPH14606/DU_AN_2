@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Danh sách câu hỏi')
@section('content')  
    <div class="card">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Câu hỏi : {{ $quiz->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="{{ BASE_URL . 'quiz' }}">Danh sách</a></li> -->
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
                    <th>Câu hỏi</th>
                    <th>Quiz</th>
                    <th>Câu A</th>
                    <th>Câu B</th>
                    <th>Câu C</th>
                    <th>Câu D</th>
                    <!-- <th>img</th> -->
                    <th>Đúng - Sai</th>
                    <th><a href="{{ BASE_URL . 'question/add?quiz_id=' . $quiz->id }}">Tạo mới</a></th>
                </thead>
                <tbody>
                    @foreach ($question as $sub)
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td>{{ $sub->name }}</td>
                            <td>{{ $sub->quiz_id }}</td>
                            <td>{{ $sub->answerA }}</td>
                            <td>{{ $sub->answerB }}</td>
                            <td>{{ $sub->answerC }}</td>
                            <td>{{ $sub->answerD }}</td>
                            <!-- <td>{{ $sub->img }}</td> -->
                            @if ($sub->correct == 1)
                                <td>A</td>
                            @elseif ($sub->correct == 2)
                                <td>B</td>
                            @elseif ($sub->correct == 3)
                                <td>C</td>
                            @elseif ($sub->correct == 4)
                                <td>D</td>
                            @endif
                            </td>
                            <td>
                                <a href="{{ BASE_URL . 'question/edit/' . $sub->id }}" class="btn btn-primary">Sửa</a>
                                <a onclick="return confirm('bạn có chắc muốn xóa không?')" href="{{ BASE_URL . 'question/xoa?id=' . $sub->id . '&quiz_id=' . $sub->quiz_id }}" class="btn btn-primary">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@endsection
            