<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\SubjectController;
use App\Controllers\QuestionController;
use App\Controllers\UserController;
use Phroute\Phroute\RouteCollector; 

function applyRoute($url){
    $router = new RouteCollector();
    $router->get('test-layout', function(){
        return view('layouts.main');
    });
    $router->filter('auth', function(){
        if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
            header('location: ' . BASE_URL . 'login');
            die;
        }
    });
    $router->group(['prefix' => '', 'before' => 'auth'], function($router){
        $router->get('/', [HomeController::class, 'index']);
    });
    $router->group(['prefix' => 'ql_user', 'before' => 'auth'], function($router){
        $router->get('/', [UserController::class, 'index']);
        $router->get('chiTiet/{student_id}', [UserController::class, 'chiTiet']);
    });
    $router->group(['prefix' => 'mon-hoc', 'before' => 'auth'], function($router){
        $router->get('tao-moi', [SubjectController::class, 'addForm']);
        $router->post('tao-moi', [SubjectController::class, 'saveAdd']);
        $router->get('cap-nhat/{id}', [SubjectController::class, 'editForm']);
        $router->post('cap-nhat/{id}', [SubjectController::class, 'saveEdit']);
        $router->get('xoa', [SubjectController::class, 'remove']);
    });
    $router->group(['prefix' => 'quizs', 'before' => 'auth'], function($router){
        $router->get('add', [QuizController::class, 'newQuiz']);
        $router->post('add', [QuizController::class, 'saveAdd']);
        $router->get('edit/{id}', [QuizController::class, 'editQuiz']);
        $router->post('edit/{id}', [QuizController::class, 'saveEdit']);
        $router->get('/', [QuizController::class, 'index']);
        $router->get('xoa', [QuizController::class, 'remove']);
        $router->get('/start', [QuizController::class, 'startQuiz']);
        $router->post('/start', [QuizController::class, 'endQuiz']);
    });
    $router->group(['prefix' => 'question', 'before' => 'auth'], function($router){
        $router->get('add', [QuestionController::class, 'newQuestion']);
        $router->post('add', [QuestionController::class, 'saveAdd']);
        $router->get('edit/{id}', [QuestionController::class, 'editQuestion']);
        $router->post('edit/{id}', [QuestionController::class, 'saveEdit']);
        $router->get('/', [QuestionController::class, 'index']);
        $router->get('xoa', [QuestionController::class, 'remove']);
    });
    $router->get('login', [LoginController::class, 'index']);
    $router->post('login', [LoginController::class, 'login']);
    $router->get('logout', function(){
        unset($_SESSION['auth']);
        header('location: ' . BASE_URL);
        die;
    });
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    echo $response;
}
?>