<?php

namespace Core;
use PDO;
use PDOException;

class Model {
    protected $db;

    public function __construct()
    {
        // DB DATA
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'blogDB';

        try {            
            $this->db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Error connecting to the Database: " . $error->getMessage();
        }
    }
}