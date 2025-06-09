<?php

class Controller {
    // Fungsi-fungsi umum yang bisa diakses oleh semua controller
    public function view($view, $data = []) {
        // Logika untuk memuat file view
        // Pastikan path ke views benar
        $viewPath = BASEPATH . '/app/views/' . $view . '.php';
        if (file_exists($viewPath)) {
            extract($data); // Ekstrak data array menjadi variabel
            require_once $viewPath;
        } else {
            // Opsional: Penanganan error view tidak ditemukan
            die("View '$view' not found.");
        }
    }

    public function model($model) {
        // Logika untuk memuat file model
        // Pastikan path ke models benar
        $modelPath = BASEPATH . '/app/models/' . $model . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model(); // Instansiasi model
        } else {
            // Opsional: Penanganan error model tidak ditemukan
            die("Model '$model' not found.");
        }
    }
}
