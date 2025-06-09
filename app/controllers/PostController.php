<?php

class PostController extends Controller {
    public function index() {
        $postModel = $this->model('Post');
        $data = $postModel->getAll();
        $this->view('layout/header');
        $this->view('post/index', $data);
        $this->view('layout/footer');
    }
}
