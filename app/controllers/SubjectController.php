<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectController{ 
    public function index(){
        $subjects = Subject::all();
        return view('mon-hoc.index', ['subjects' => $subjects]);       
    }
    public function addForm(){ 
        return view('mon-hoc.add-form');
        // include_once "./app/views/mon-hoc/add-form.blade.php";
    }

    public function editForm($id){ 
        $model = Subject::where('id', '=', $id)->first(); 
        if(!$model){
            header('location: ' . BASE_URL );
            die;
        }
        return view('mon-hoc.edit-form', ['name' => $model->name, 'id' => $id]);
    } 
    public function saveAdd(){
        $model = new Subject();
        $data = [
            'name' => $_POST['name']
        ];
        $model->insert($data);
        header('location: ' . BASE_URL);
        die;
    }
    public function saveEdit($id){
        $Subject = Subject::where('id', $id)->first();
        $Subject->name = $_POST['name'];
        $Subject->save();
        header('location: ' . BASE_URL);
    }
    public function remove(){
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL );
        die;
    }
} 
?>