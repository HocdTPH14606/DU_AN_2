<?php
namespace App\Controllers; 
use App\Models\Question;
use App\Models\Answer;

class AnswerController{

    public function index(){ 
        $question_id = $_GET['question_id'];
        $question = Question::where(['id', '=', $question_id])->first();
        $answer = Answer::where(['question_id', '=', $question_id])->get();  
        if(!$answer){
            header('location: ' . BASE_URL . 'answer/tao-moi?question_id=' . $question->id);
            die;
        }
        include_once "./app/views/answer/index.php";
    } 
    public function newAnswer(){  
        $question_id = $_GET['question_id'];
        $question = Question::where(['id', '=', $question_id])->first();
        include_once "./app/views/answer/add-form.php";
    }  
    public function editAnswer(){
        $question_id = $_GET['question_id'];
        $question = Question::where(['id', '=', $question_id])->first();
        $id = $_GET['id']; 
        $answer = Answer::where(['id', '=', $id])->first();
        if(!$question){
            header('location: ' . BASE_URL . 'answer?question_id=' . $question->id);
            die;
        }
        include_once "./app/views/answer/edit-form.php";
    } 
    public function saveAdd(){
        $Answer = new Answer();
        $question_id = $_GET['question_id'];
        $question = Question::where(['id', '=', $question_id])->first();
        $data = [
            'question_id' => $_POST['question_id'],
            'content' => $_POST['content'],
            'is_correct' => $_POST['is_correct'] 
            // $file = $_FILES['img'],
            // $img = $file['name'],
            // move_uploaded_file($file['tmp_name'], "../images/" . $img)
        ];
        $Answer->insert($data);
        header('location: ' . BASE_URL . 'answer?question_id=' . $question->id);
        die;
    } 
    public function saveEdit(){
        $id = $_GET['id']; 
        $answer = answer::where(['id', '=', $id])->first();
        if(!$answer){
            header('location: ' . BASE_URL . 'answer?question_id=' . $answer->question_id);
            die;
        } 
        $data = [
            'question_id' => $_POST['question_id'],
            'content' => $_POST['content'],
            'is_correct' => $_POST['is_correct'] 
            // $file = $_FILES['img'],
            // $img = $file['name'],
            // move_uploaded_file($file['tmp_name'], "../images/" . $img)
        ];
        $answer->update($data);
        header('location: ' . BASE_URL . 'answer?question_id=' . $answer->question_id);
        var_dump($data);
        die;
    } 
    public function remove(){
        $id = $_GET['id'];
        $question_id = $_GET['question_id'];
        Answer::destroy($id);
        header('location: ' . BASE_URL . 'answer?question_id=' . $question_id);
        die;
    }
}
?>