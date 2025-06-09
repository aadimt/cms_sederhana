<?php

class App {
    // Default controller dan method jika URL kosong atau tidak valid
    protected $controller = 'HomeController'; // Asumsi Anda punya HomeController
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL(); // Mengambil dan membersihkan URL

        // --- Bagian Controller ---
        // Cek apakah ada segmen URL untuk controller, dan apakah controller itu ada
        if (!empty($url) && isset($url[0])) {
            // Ubah segmen URL menjadi format nama kelas Controller (misal: post -> PostController)
            $requestedController = ucfirst($url[0]) . 'Controller';
            $controllerPath = BASEPATH . '/app/controllers/' . $requestedController . '.php';

            if (file_exists($controllerPath)) {
                $this->controller = $requestedController;
                unset($url[0]); // Hapus segmen controller dari URL
            }
            // else {
            //     // Opsional: Redirect ke 404 atau Home jika controller tidak ditemukan
            //     // header('Location: /404'); exit();
            // }
        }

        // Muat file controller dan instansiasi
        // Pastikan kelas Controller base sudah dimuat sebelumnya oleh public/index.php
        require_once BASEPATH . '/app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller(); // Tambahkan kurung () untuk instansiasi


        // --- Bagian Method ---
        // Cek apakah ada segmen URL untuk method
        if (isset($url[1])) {
            // Pastikan method ada dan bisa diakses
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]); // Hapus segmen method dari URL
            }
            // else {
            //     // Opsional: Redirect ke 404 atau tampilkan error method tidak ditemukan
            // }
        }

        // --- Bagian Parameters ---
        // Ambil sisa segmen URL sebagai parameter
        // array_values() untuk mengatur ulang indeks array setelah unset
        $this->params = $url ? array_values($url) : [];

        // Panggil method controller dengan parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
        if (isset($_GET['url'])) {
            // Membersihkan dan memisahkan URL
            // rtrim($_GET['url'], '/') untuk menghapus trailing slash
            // FILTER_SANITIZE_URL untuk membersihkan URL dari karakter ilegal
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return []; // Selalu kembalikan array kosong jika $_GET['url'] tidak diset
    }
}
