<?php

class AuthController extends Controller {
    public function index() {
        $this->view('layout/header');
        $this->view('auth/login');
        $this->view('layout/footer');
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === '12345') {
            session_start();
            $_SESSION['user'] = $username;
            header('Location: /cms_sederhana/public/home');
        } else {
            echo "<script>alert('Login gagal!'); window.location.href='/cms_sederhana/public/auth';</script>";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /cms_sederhana/public/auth');
    }
}
