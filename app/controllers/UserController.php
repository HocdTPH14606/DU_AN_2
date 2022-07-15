<?php
namespace App\Controllers;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;

class UserController{ 

    public function index(){
            $StudentQuiz = StudentQuiz::all();
            $user = user::all();
            return view('ql_user.index', ['StudentQuiz' => $StudentQuiz, 'user' => $user]);      
    } 
    public function chiTiet($student_id){ 
        // $Question = Question::where(['id', '=', $student_id])->first();
        $Quiz = Quiz::where('id', '=', $student_id)->first(); 
        $StudentQuizDetail = StudentQuizDetail::where('student_quiz_id', $student_id)->get();
        return view('ql_user.chiTiet', ['Quiz' => $Quiz, 'StudentQuizDetail' => $StudentQuizDetail]);  
    }  
    public function remove(){
        $id = $_GET['id'];
        $quiz_id = $_GET['quiz_id'];
        StudentQuiz::destroy($id);
        header('location: ' . BASE_URL . 'question?quiz_id=' . $quiz_id);
        die;
    }

}
?>