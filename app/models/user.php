<?php


namespace MVC\models;

use MVC\core\model;

class user extends model
{
    public function getAllUsers()
    {
        $data = model::db()->rows("SELECT * FROM `users`");
        return $data;
    }

    public function getUser($email, $password)
    {
        $data = model::db()->row("SELECT * FROM `users` WHERE `email`=? && `password`=?", [$email, $password]);
        return $data;
    }
}