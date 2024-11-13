<?php
class HomeController extends Controller {
    public function index() {
        $data['title'] = 'Pondok Pesantren Ashabul Kahfi';
        $this->view('home/index', $data);
    }
}