<?php
class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->findUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                
                if ($user['role'] == 'admin') {
                    header('Location: ' . BASEURL . '/dashboard/admin');
                } else {
                    header('Location: ' . BASEURL . '/dashboard/santri');
                }
                exit;
            } else {
                Flasher::setFlash('Login gagal', 'Email atau password salah', 'danger');
            }
        }
        
        $this->view('auth/login');
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL);
        exit;
    }
}