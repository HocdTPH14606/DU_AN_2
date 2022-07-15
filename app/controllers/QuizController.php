<?php

namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;
use App\Models\StudentQuiz;
use App\Models\User;
use App\Models\StudentQuizDetail;

class QuizController
{
    public function index()
    {
        $subject_id = $_GET['subject_id'];
        $subjects = Subject::where('id', '=', $subject_id)->first();
        $quiz = Quiz::where('subject_id', '=', $subject_id)->get();
       
        // $StudentQuiz = StudentQuiz::where('quiz_id', '=', $quiz_id)->first(); 

        if (!$quiz) {
            header('location: ' . BASE_URL . 'quizs/tao-moi?subject_id=' . $subjects->id);
            die;
        } 
        return view('quizs.index', ['quiz' => $quiz, 'subjects' => $subjects, 'subject_id' => $subject_id]);    
    }
    public function newQuiz()
    { 
        $start_time = date("Y/m/d h:i:s");
        $subject_id = $_GET['subject_id'];
        $subjects = Subject::where('id', '=', $subject_id)->first();
        return view('quizs.add-form', ['subject_id' => $subject_id, 'subjects' => $subjects]);
    }
    public function editQuiz($id)
    { 
        $quiz = Quiz::where('id', '=', $id)->first(); 
        $subjects = Subject::where('id', '=', $quiz->subject_id)->first(); 

        if (!$quiz) {
            header('location: ' . BASE_URL . 'quiz?subject_id=' . $quiz->subject_id);
            die;
        } 
        return view('quizs.edit-form', ['id' => $id,
                                        'quizs' => $quiz,
                                        'subjects' => $subjects,
                                        'name' => $quiz->name,
                                        'subject_id' => $quiz->subject_id,
                                        'duration_minutes' => $quiz->duration_minutes,
                                        'start_time' => $quiz->start_time,
                                        'end_time' => $quiz->end_time,
                                        'status' => $quiz->status,
                                        'is_shuffle' => $quiz->is_shuffle
                                    ]);
    }
    public function saveAdd()
    {
        $quiz = new quiz();
        $subject_id = $_POST['subject_id'];
        $subjects = Subject::where('id', '=', $subject_id)->first();
        $data = [
            'name' => $_POST['name'],
            'subject_id' => $_POST['subject_id'],
            'duration_minutes' => $_POST['duration_minutes'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'status' => $_POST['status'],
            'is_shuffle' => $_POST['is_shuffle']
        ];
        $quiz->insert($data);
        header('location: ' . BASE_URL . 'quizs?subject_id=' . $subjects->id);
        die;
    }
    public function saveEdit($id)
    { 
        $quiz = quiz::where('id', $id)->first();
        if (!$quiz){
            header('location: ' . BASE_URL . 'quiz?subject_id=' . $quiz->subject_id);
            die;
        } 
        $quiz->name = $_POST['name'];
        $quiz->subject_id = $_POST['subject_id'];
        $quiz->duration_minutes = $_POST['duration_minutes'];
        $quiz->start_time = $_POST['start_time'];
        $quiz->end_time = $_POST['end_time'];
        $quiz->status = $_POST['status'];
        $quiz->is_shuffle = $_POST['is_shuffle'];

        $quiz->save();
        header('location: ' . BASE_URL . 'quizs?subject_id=' . $quiz->subject_id);
    }

    public function remove()
    {
        $id = $_GET['id']; 
        $subject_id = $_GET['subject_id'];
        $quiz = Quiz::where('subject_id', '=', $subject_id)->get();
        $subjects = Subject::where('id', '=', $subject_id)->first();
        quiz::destroy($id);
        header('location: ' . BASE_URL . 'quizs?subject_id=' . $subject_id);
        die; 
    }
    public function startQuiz()
    {
        $id = $_GET['id'];
        $quiz = quiz::where('id', $id)->first(); 
        $start_time = date("Y/m/d h:i:s");
        // if($quiz->is_shuffle == 1){
            $question = Question::where('quiz_id', '=', $id)->get();
        // }else{
            // $question = Question::daoTron('quiz_id', '=', $id)->get();
        // }
        return view('startQuiz.index', ['quiz' => $quiz, 'start_time' => $start_time, 'question' => $question]);
    }
    public function endQuiz()
    {
        $StudentQuiz = new StudentQuiz();
        $StudentQuizDetail = new StudentQuizDetail();

        $id = $_GET['id'];
        $quiz = Quiz::where('id', '=', $id)->get(); 
        if (isset($_POST['end'])) {
            $score = 0;
            $arr = $_POST;
            foreach ($arr as $key => $value) {
                if (is_numeric($key)) { 
                    $question = Question::where('id', '=', $key)->first();
                    if ($value ==  $question->correct) {
                        $score += 2;
                    }
                    $data = [
                        'student_quiz_id' => $id,
                        'question_id' => $key,
                        'answer_id' => $value
                    ];
                    $StudentQuizDetail->insert($data);
                }
            }
        }
        $dt = [
            'student_id' => $_SESSION["auth"]["id"],
            'quiz_id' => $id,
            'start_time' => $_POST['start_time'],
            'end_time' => date("Y/m/d h:i:s"),
            'score' => $score
        ];
        $StudentQuiz->insert($dt);
        header('location: ' . BASE_URL . 'quizs?subject_id=' . $id);
    }
}
