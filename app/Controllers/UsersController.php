<?php

// namespace App\Controllers;
use App\Models\User;

class UsersController extends \QueryBuilder
{


    public function CreateAccount(User $user)
    {
        $data = [
            'username' => $user->getUsername(),
            'password' => $user->getPassword()
        ];
        $sql = "INSERT INTO users (username,password) VALUES (:username, :password)";
        return $this->insertData($sql, $data);
    }

    public function Login($username, $password)
    {
        $sql = "SELECT id, username, password FROM users WHERE username = '$username'";

        $row =  $this->find($sql);

        $result = $row->fetch();
        if($result == false) {
            $data = [
                'logging' => false,
                'incorrect' => 'username'
            ];
            return $data;
        }
        if (password_verify($password, $result['password'])) {

            $_SESSION['id'] = $result['id'];
            $_SESSION['user'] = $result['username'];
            $_SESSION['loggedin'] = true;
            $data = [
                'username' => $result['username'],
                'logging' => true
            ];

            return $data;
        } else {
            $data = [
                'logging' => false,
                'incorrect' => 'password'
            ];
            return $data;
        }
    }

    public function Logout()
    {

        $_SESSION['user'] = null;
        return session_destroy();
    }
}