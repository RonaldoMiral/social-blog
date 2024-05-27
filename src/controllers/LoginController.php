<?php

use Core\View;

class LoginController extends View {
    public function loadForm() {
        $this->render("login");
    }
}