<?php

namespace Source\Models;
use Core\Model;
use PDO;


class UserModel extends Model {
    private $users_table = 'users';

    public function loadUsers() {
        $query = "SELECT * FROM users";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveUser($user_data) {
        extract($user_data);
        $query = "INSERT INTO {$this->users_table}(username, email, user_password)
            VALUES (:username, :email, :user_password)";
        
        $statement = $this->db->prepare($query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $args = [':username' => $name, ':email' => $email, 'user_password' => $hashed_password];
        return $statement->execute($args);
    }

    public function validateUserData($name, $email, $password, $confirmPassword) {
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            return "Please fill in all the fields";
        }

        if ($password !== $confirmPassword) {
            return "The inserted passwords are different";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        return true;
    }
}