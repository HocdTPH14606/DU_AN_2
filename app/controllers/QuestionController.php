<?php
namespace App\Controllers; 
use App\Models\Question;
use App\Models\Quiz;

class QuestionController{

    public function index(){ 
        $quiz_id = $_GET['quiz_id'];
        $quiz = Quiz::where('id', '=', $quiz_id)->first();
        $question = question::where('quiz_id', '=', $quiz_id)->get();  
        if(!$question){
            header('location: ' . BASE_URL . 'question/tao-moi?quiz_id=' . $quiz->id);
            die;
        } 
        return view('question.index', ['question' => $question,'quiz' => $quiz]);       
    }

    public function newQuestion(){ 
        $quiz_id = $_GET['quiz_id'];
        $quiz = Quiz::where('id', '=', $quiz_id)->first(); 
        return view('question.add-form', ['quiz' => $quiz]) ;
    } 
    
    public function editQuestion($id){ 
        $question = question::where('id', '=', $id)->first(); 
        $quiz = Quiz::where('id', '=', $question->quiz_id)->first(); 
        if(!$question){
            header('location: ' . BASE_URL . 'question?quiz_id=' . $quiz->id);
            die;
        }
        return view('question.edit-form', ['id' => $id,
                                        'quiz' => $quiz,
                                        'quiz_name' => $quiz->name,
                                        'question' => $question,
                                        'name' => $question->name,
                                        'quiz_id' => $question->quiz_id,
                                        'answerA' => $question->answerA,
                                        'answerB' => $question->answerB,
                                        'answerC' => $question->answerC,
                                        'answerD' => $question->answerD,
                                        'correct' => $question->correct
                                    ]);
    } 
    public function saveAdd(){
        $question = new question();
        $quiz_id = $_POST['quiz_id'];
        $quiz = Quiz::where('id', '=', $quiz_id)->first();
        $data = [
            'name' => $_POST['name'],
            'quiz_id' => $_POST['quiz_id'], 
            'answerA' => $_POST['answerA'],
            'answerB' => $_POST['answerB'], 
            'answerC' => $_POST['answerC'],
            'answerD' => $_POST['answerD'],
            'correct' => $_POST['correct'] 
        ];
        $question->insert($data);
        header('location: ' . BASE_URL . 'question?quiz_id=' . $quiz->id);
        die;
    }

    public function saveEdit($id){
        $question = question::where('id', '=', $id)->first();
        if(!$question){
            header('location: ' . BASE_URL . 'question?quiz_id=' . $question->quiz_id);
            die;
        } 
            $question->name = $_POST['name'];
            $question->quiz_id = $_POST['quiz_id'];
            $question->quiz_id = $_POST['quiz_id']; 
            $question->answerA = $_POST['answerA'];
            $question->answerB = $_POST['answerB']; 
            $question->answerC = $_POST['answerC'];
            $question->answerD = $_POST['answerD'];
            $question->correct = $_POST['correct']; 
        $question->save();
        header('location: ' . BASE_URL . 'question?quiz_id=' . $question->quiz_id);
        die;
    }

    public function remove(){
        $id = $_GET['id'];
        $quiz_id = $_GET['quiz_id'];
        question::destroy($id);
        header('location: ' . BASE_URL . 'question?quiz_id=' . $quiz_id);
        die;
    }
}
?>