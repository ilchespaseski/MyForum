<?php

class DatabaseConnection
{
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "forum";
    public $sql;
    public $conn;

    public
    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host", $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $this->database";

            $this->conn->exec($sql);
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        } catch(PDOException $e) {
            $sql =null;
            echo $sql . "<br>" . $e->getMessage();
        }

    }

    public function exec($sql)
    {
        $this->conn->exec($sql);

    }

}