<?php

use Core\View;

class RegisterController extends View {
    public function loadForm() {
        $this->render("register");
    }
}