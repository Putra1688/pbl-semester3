<?php
class DashboardController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function admin() {
        if ($_SESSION['role'] !== 'admin') {
            header('Location: ' . BASEURL . '/dashboard/santri');
            exit;
        }

        $data['title'] = 'Admin Dashboard';
        $this->view('dashboard/admin', $data);
    }

    public function santri() {
        if ($_SESSION['role'] !== 'santri') {
            header('Location: ' . BASEURL . '/dashboard/admin');
            exit;
        }

        $data['title'] = 'Santri Dashboard';
        $this->view('dashboard/santri', $data);
    }
}