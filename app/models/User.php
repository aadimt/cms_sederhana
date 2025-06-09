public function login()
{
    $userModel = $this->model('User');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($userModel->login($username, $password)) {
            $_SESSION['user'] = ['username' => $username];
            header('Location: ' . BASE_URL . '/dashboard');
        } else {
            $error = 'Username atau password salah';
            $this->view('auth/login', ['error' => $error]);
        }
    } else {
        $this->view('auth/login');
    }
}
