<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Core\View;
use Source\Models\UserModel;

class HomeController extends View {
    public function index() {
        $users_instance = new UserModel();
        $users = $users_instance->loadUsers();

        $res = $users;


        $this->render("home", $users);
    }
}