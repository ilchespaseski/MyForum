<?php
include_once 'C:\xampp\htdocs\MyForum\app\Database\Database.php';

class QueryBuilder extends Database
{
    public $conn;

    function __construct()
    {
        $this->conn = new \Database();
    }

    public function createTable($sql)
    {
        try {
            $pdo = $this->connect();
            $pdo->exec($sql);

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insertData($sql, $data)
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare($sql);
            return $stmt->execute($data);

        } catch (PDOException $e) {
            echo $e;
        }

    }
    public function deleteData($sql, $data)
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare($sql);
            return $stmt->execute($data);

        } catch (PDOException $e) {
            echo $e;
        }

    }

    public function find($sql){
        $pdo = $this->connect();
        $res = $pdo->query($sql);
        return $res;
    }

}