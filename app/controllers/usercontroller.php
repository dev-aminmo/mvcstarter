<?php


namespace MVC\controllers;
use MVC\core\Session;
use GUMP;
use MVC\core\controller;
use MVC\models\user;

class usercontroller extends controller
{
public function __construct()
{
    Session::start();
    if(empty(Session::Get('user'))){
        echo 'class cannot be accessed';die;
    }
}
    public function index(){
     echo 'welcome to user';
    }
}