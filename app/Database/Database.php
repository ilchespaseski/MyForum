<?php

class Database
{
//
//    private $host = "sql107.epizy.com";
//    private $username = "epiz_32776612";
//    private $password = "oVrMNTrSUpODf";
//    private $database = "epiz_32776612_myforum";
    private $host = "localhost";

     private $username = "root";
     private $password = "root";
     private $database = "id18824953_myforum";
    public  $conn;

    public function connect()
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
            } catch (PDOException $e) {
                return "Connection failed: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            $sql = null;
            return $sql . "<br>" . $e->getMessage();
        }
    }
}