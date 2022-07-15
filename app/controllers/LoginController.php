<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{
    public function index()
    {

        if (isset($_SESSION['user'])) {
            header('location: ' . BASE_URL . 'mon-hoc');
            // session_unset();
            die;
        } else {
            $email = User::get_cookie("email");
            $password = User::get_cookie("password");
            return view('login.index');
            die;
        }
    }
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->first();
        if ($user && $password == $user->password ) {
            $_SESSION["auth"] = [
                "id" => $user->id,
                "role_id" => $user->role_id,
                "name" => $user->name
            ];
            header('location: ' . BASE_URL);
            die;
        } else {
            session_unset();
            $_SESSION["er_pas"] = "Tài khoản hoặc mật khẩu sai !";
            header('location: ' . BASE_URL . 'login');
            die;
        }
    }
    public function logout()
    {
        session_unset();
        header('location: ' . BASE_URL);
    }
}
