public function register()
{
    $error = '';
    $success = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm'] ?? '';

        if ($password !== $confirm) {
            $error = 'Password tidak cocok.';
        } elseif (empty($username) || empty($password)) {
            $error = 'Semua field wajib diisi.';
        } else {
            // Simulasi register berhasil (di sistem nyata, disimpan ke database)
            $success = 'Pendaftaran berhasil. Silakan login.';
        }
    }

    $this->view('auth/register', ['error' => $error, 'success' => $success]);
}


