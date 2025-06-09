<?php

class HomeController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $this->view('home/index', ['username' => $_SESSION['user']]);
    }
}
