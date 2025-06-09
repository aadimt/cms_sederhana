<?php

class PostController extends Controller {
    public function __construct() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /cms_sederhana/public/auth');
            exit;
        }
    }

    public function index() {
        $postModel = $this->model('Post');
        $data = $postModel->getAll();
        $this->view('layout/header');
        $this->view('post/index', $data);
        $this->view('layout/footer');
    }
}
