<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
    protected $db;

    public function __construct()
    {
        // DB DATA
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'blogDB';
        $host_dbname = "mysql:host=$hostname;dbname=$database";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->db = new PDO($host_dbname, $username, $password, $options);
        } catch (PDOException $error) {
            echo "Error connecting to the Database: " . $error->getMessage();
        }
    }

    protected function loadAllData($table)
    {
        $query = "SELECT * FROM $table";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }
}
