<?php
namespace App\Models;

class User
{
    protected $username, $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $this->hashPassword($password);

    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function hashPassword($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}