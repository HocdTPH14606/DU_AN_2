@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Trang chủ')
@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách môn học</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 600px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <th>Mã môn</th>
                    <th>Môn học</th>
                    @if($_SESSION["auth"]["role_id"] == 1)
                    <th>
                        <a href="{{ BASE_URL . 'mon-hoc/tao-moi' }}">Tạo mới</a>
                    </th>
                    @else 
                    @endif
                    
                </thead>
                <tbody>
                    @foreach ($subjects as $sub)
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td><a href="{{ BASE_URL . 'quiz?subject_id=' . $sub->id }}">{{ $sub->name }}</a></td>
                            @if($_SESSION["auth"]["role_id"] == 1)
                            <td>
                                <a href="{{ BASE_URL . 'mon-hoc/cap-nhat?id=' . $sub->id }}" class="btn btn-primary">Sửa</a>
                                <a onclick="return confirm('bạn có chắc muốn xóa không?')" href="{{ BASE_URL . 'mon-hoc/xoa?id=' . $sub->id }}" class="btn btn-primary">Xóa</a>
                            </td>
                    @else 
                    @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>  
@endsection