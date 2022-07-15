@if($_SESSION["auth"]["role_id"] == 1)
@extends('layouts.client.main')
@else
@extends('layouts.students.main')
@endif
@section('title', 'Start quiz')
@section('content')  
<div class="card border-info">
    <div class="row card-header">
        <div class="col-sm-12 text-left">
            <h2>{{ $quiz->name }}</h2>
        </div>
    </div>
    <form action="" method="post">
        <div class="card-body text-info">
            <?php $i = 1; ?>
            @foreach ($question as $ques)
                <div class="row" style="margin-left: 10px;">
                    <h5 style="font-weight: bold; color: black;" id="{{ $ques->id }}" >Câu hỏi {{ $i }}: {{ $ques->name }}</h5>
                    <div class="radio col-md-12">
                        <label><input type="radio" name="{{ $ques->id }}" id="check" value="1"> A. {{ $ques->answerA }}</label>
                    </div>
                    <div class="radio col-md-12">
                        <label><input type="radio" name="{{ $ques->id }}" id="check" value="2"> B. {{ $ques->answerB }}</label>
                    </div>
                    <div class="radio col-md-12">
                        <label><input type="radio" name="{{ $ques->id }}" id="check" value="3"> C. {{ $ques->answerC }}</label>
                    </div>
                    <div class="radio col-md-12">
                        <label><input type="radio" name="{{ $ques->id }}" id="check" value="4"> D. {{ $ques->answerD }}</label>
                    </div>
                </div>
                <?php $i++ ?>
            @endforeach 
            <input type="hidden" name="start_time" value="{{$start_time}}"> 
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" name="end" class="btn btn-primary">Kết thúc bài quiz</button>
                </div>
            </div> 
        </div>
    </form>
</div>
@endsection