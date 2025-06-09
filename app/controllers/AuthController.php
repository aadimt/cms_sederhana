<?php

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // login sederhana
            if ($email === 'admin@example.com' && $password === '123456') {
                $_SESSION['user'] = $email;
                header('Location: /cms_sederhana/home');
                exit;
            } else {
                $error = "Login gagal!";
            }
        }

        $this->view('auth/login', isset($error) ? ['error' => $error] : []);
    }

    public function register() {
        $this->view('auth/register');
    }

    public function logout() {
        session_destroy();
        header('Location: /cms_sederhana/auth/login');
        exit;
    }
}
