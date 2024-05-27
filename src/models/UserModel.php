<?php

namespace Source\Models;
use Core\Model;


class UserModel extends Model {
    public function loadUsers() {
        $query = "SELECT * FROM users";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }
}