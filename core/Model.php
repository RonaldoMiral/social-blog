<?php

namespace Core;
use PDO;

class Model {
    protected $db;
    // DB DATA
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'blogDB';

    public function __construct()
    {
        $this->db = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}