<?php

class App {
    protected $controller = 'PostController'; // Default controller
    protected $method = 'index';     // Default method
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL(); // Mendapatkan URL yang sudah diurai

        // Memeriksa apakah $url tidak kosong dan elemen pertama ada
        // ini untuk menentukan controller
        if (!empty($url) && isset($url[0])) { //
            // Memeriksa apakah file controller ada
            if (file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) { //
                $this->controller = ucfirst($url[0]) . 'Controller'; //
                unset($url[0]); //
            }
        }

        // Memuat file controller yang sesuai
        require_once '../app/controllers/' . $this->controller . '.php'; //
        $this->controller = new $this->controller; //

        // Memeriksa apakah elemen kedua dari URL ada dan merupakan method yang valid
        // ini untuk menentukan method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) { //
            $this->method = $url[1]; //
            unset($url[1]); //
        }

        // Mengambil sisa URL sebagai parameter
        // Menggunakan array_values untuk mengatur ulang indeks setelah unset
        $this->params = $url ? array_values($url) : []; //

        // Memanggil method controller dengan parameter yang sesuai
        call_user_func_array([$this->controller, $this->method], $this->params); //
    }

    private function parseURL() {
        if (isset($_GET['url'])) {
            // Membersihkan dan memisahkan URL menjadi bagian-bagian
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)); //
        }
        return []; // <-- Penting: Kembalikan array kosong jika $_GET['url'] tidak disetel
    }
}