<?php

require_once 'app/models/User.php';

class AuthController extends Controller
{
    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            if ($userModel->login($username, $password)) {
                $_SESSION['user'] = $username;
                header('Location: ' . BASE_URL . '/home');
                exit;
            } else {
                $error = 'Username atau password salah!';
            }
        }

        $this->view('auth/login', ['error' => $error]);
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
        exit;
    }
}

