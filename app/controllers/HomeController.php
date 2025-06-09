public function __construct() {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /cms_sederhana/public/auth');
        exit;
    }
}
