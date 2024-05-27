<?php

use Core\View;

class RegisterController extends View {
    public function loadForm() {
        $this->render("register");
    }

    public function newUser() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if(!$this->isVerified($name) || !$this->isVerified($email) ||
            !$this->isVerified($password) || !$this->isVerified($confirmPassword))
        {
            echo "Please fill in all the fields<br>";
            return;
        }

        if($password !== $confirmPassword) {
            echo "The inserted passwords are diferents";
            return;
        }


        echo $name.'<br>';
        echo $email.'<br>';
        echo $password.'<br>';
        echo $confirmPassword.'<br>';

    }


    private function isVerified($value): bool {
        return isset($value) && !empty($value);
    }
}