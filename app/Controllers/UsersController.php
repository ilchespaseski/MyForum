<?php

namespace App\Controllers;
use App\Models\User;

class UsersController extends \QueryBuilder
{
    protected $query;

    public function __construct()
    {
        $this->query = new \QueryBuilder();
    }

    public function CreateAccount(User $user)
    {
        $data = [
            'username' => $user->getUsername(),
            'password' => $user->getPassword()
        ];
        $sql = "INSERT INTO Users (username,password) VALUES (:username, :password)";
        return $this->query->insertData($sql, $data);
    }

    public function Login($username, $password)
    {
         $sql = "SELECT id, username, password FROM Users WHERE username = '$username'";
        $row =  $this->find($sql);
        $result = $row->fetch();
       if(password_verify($password,$result['password'])){
           session_start();
           $_SESSION['id'] = $result['id'];
           $_SESSION['user'] = $result['username'];
           $_SESSION['loggedin']=true;
           $data = [
               'username'=> $result['username'],
               'logging' => true
           ];

           return $data;
       }
       else {
           return false;
       }


    }

    public function Logout()
    {
        session_start();
        $_SESSION['user']=null;
       return session_destroy();
    }
}