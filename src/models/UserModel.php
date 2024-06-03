<?php

namespace Source\Models;
use Core\Model;
use Exception;
use PDO;

class UserModel extends Model {
    private $table = 'users';

    public function saveNewUser($user_data) {
        extract($user_data);
        $query = "INSERT INTO {$this->table}(username, email, user_password)
            VALUES (:username, :email, :user_password)";
        
        $statement = $this->db->prepare($query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $args = [':username' => $name, ':email' => $email, 'user_password' => $hashed_password];
        return $statement->execute($args);
    }

    public function getUserByUsername($username) {
        try {            
            $query = "SELECT * FROM {$this->table} WHERE username = :username";
            $statement = $this->db->prepare($query);
            $statement->execute([':username' => $username]);
            $user = $statement->fetch();

            if(!$user) throw new Exception("User not found!");
            return $user;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    public function loadAllUserData($id) {
        $posts_table = "posts";
        $query = "SELECT * FROM {$this->table} JOIN {$posts_table} ON
            {$this->table}.id = {$posts_table}.user_id WHERE {$this->table}.id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);
        $user = $statement->fetch();

        // if(!$user) throw new Exception("User not found!");
        return $user;
    }

    public function validateUserData($name, $email, $password, $confirm_password) {
        if(empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            return "Please fill in all the fields";
        }

        if($password !== $confirm_password) {
            return "The passwords are different. Make sure they are the same";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        return true;
    }
}