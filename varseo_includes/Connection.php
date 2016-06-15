<?php
class Connection
{
    protected $host = "localhost";
    protected $dbname = "";
    protected $user = "";
    protected $pass = "";
    protected $conn;

    function __construct() {

        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        }
        catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function closeConnection() {

        $this->conn = null;
    }
}