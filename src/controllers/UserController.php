<?php

use Core\View;
use Source\Models\UserModel;

class UserController extends View {
    public function index() {
        echo "<h1>Be welcome to the user controller</h1>";
    }

    public function loadSignUpForm() {
        $this->render("register");
    }

    public function newUser() {
        if(!isset($_POST['name']) || !isset($_POST['name']) ||
            !isset($_POST['name']) || !isset($_POST['name']))
        {
            echo "Some requested inputs are not defined";
            return;
        }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $user = new UserModel();
        $result = $user->validateUserData($name, $email, $password, $confirmPassword);

        if($result !== true) {
            echo $result;
            return;
        }

        $user_data = ['name' => $name, 'email' => $email, 'password' => $password];
        if($user->saveUser($user_data)) {
            echo "User saved successfully";
        }

    }
}