<?php

class HomeController extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: /cms_sederhana/auth/login');
            exit;
        }

        $this->view('post/index');
    }
}
