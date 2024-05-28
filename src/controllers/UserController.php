<?php
session_start();
require_once preg_replace("/src.*/", "config/config.php", __DIR__);
use Core\View;
use Source\Models\UserModel;

class UserController extends View
{
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        echo "<h1>Be welcome to the user controller</h1>";
    }

    public function loadSignUpForm()
    {
        $this->render("register");
    }

    public function loadSingInForm()
    {
        $this->render("login");
    }

    public function auth()
    {
        if (!isset($_POST['name']) || !isset($_POST['password'])) {
            echo "Some requested inputs are not defined";
            return;
        }

        $name = $_POST['name'];
        $password = $_POST['password'];

        if(empty($name) || empty($password)) {
            echo "Please fill in all the fields";
            return;
        }

        $result = $this->user->loadUser($name);

        if($result && password_verify($password, $result['user_password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            header('Location: '.BASE_URL.'public/');
            exit;
        } else {
            echo 'Invalid username or password';
        }
    }

    public function newUser()
    {
        if (
            !isset($_POST['name']) || !isset($_POST['email']) ||
            !isset($_POST['password']) || !isset($_POST['confirmPassword'])
        ) {
            echo "Some requested inputs are not defined";
            return;
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];


        $result = $this->user->validateUserData($name, $email, $password, $confirmPassword);

        if ($result !== true) {
            echo $result;
            return;
        }

        $user_data = ['name' => $name, 'email' => $email, 'password' => $password];
        if ($this->user->saveUser($user_data)) {
            echo "User saved successfully";
            header('Location: '.BASE_URL.'public/');
        }
    }
}
