<?php

namespace Source\Controllers;
// session_start();
use Core\View;
use Source\Models\UserModel;
use Exception;

class UserController
{
    private $user;
    private $user_id;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
    }

    public function createNewUser()
    {
        View::render('register');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['sender'])) return;

        if (
            filter_input(INPUT_POST, 'name', FILTER_DEFAULT) === null ||
            filter_input(INPUT_POST, 'email', FILTER_DEFAULT) === null ||
            filter_input(INPUT_POST, 'password', FILTER_DEFAULT) === null ||
            filter_input(INPUT_POST, 'confirmPassword', FILTER_DEFAULT) === null
        ) {
            echo "The requested fields are not defined";
            return;
        }

        $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $confirm_password = filter_input(INPUT_POST, 'confirmPassword', FILTER_DEFAULT);

        $validation = $this->user->validateUserData($name, $email, $password, $confirm_password);
        if ($validation !== true) {
            echo $validation;
            return;
        }

        $user_data = ['name' => $name, 'email' => $email, 'password' => $password];
        $created = $this->user->saveNewUser($user_data);
        if ($created) {
            header('Location: ' . BASE_URL);
        } else {
            echo "Error: user not created";
            return;
        }
    }

    public function signIn()
    {
        View::render('login');


        if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['sender'])) return;

        if (
            filter_input(INPUT_POST, 'name', FILTER_DEFAULT) === null ||
            filter_input(INPUT_POST, 'password', FILTER_DEFAULT) === null
        ) {
            echo "The requested fields are not defined";
            return;
        }

        $username = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

        if (empty($username) || empty($password)) {
            echo "Please fill in all the fields";
            return;
        }

        try {
            $user = $this->user->getUserByUsername($username);

            if (password_verify($password, $user["user_password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];

                header('Location: ' . BASE_URL);
            }
        } catch (Exception $error) {
            echo "Error: " . $error->getMessage();
            return;
        }
    }

    public function loadUserData()
    {
        $post_controller = new PostController();
        $user_posts = $post_controller->loadPostsByUserId($this->user_id);

        View::render('user', $user_posts);
    }

    public function logOut() {
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
