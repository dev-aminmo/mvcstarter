<?php
namespace MVC\controllers;
use http\Header;
use MVC\core\controller;
use MVC\core\Session;
use MVC\models\user;
use GUMP;
use MVC\core\helper;
class homecontroller  extends controller{
    public function __construct()
    {
        Session::start();
    }

    public function index(){ 
        $title="MOH";
        $h1="Hello MVC";
       $user=new user();

        $data=$user->getAllUsers();
        echo"getting all users";


        // $data=$this->db()->rows("SELECT * FROM `users`");
        $this->view("home\index",["title"=>$title,"h1"=> $h1,"data"=>$data]);
        
        
        echo 'hello from controller';
    }
    public  function  login(){
        echo'Hello from login';
        $this->view("home\login",[]);
    }
    public  function  postLogin(){
       $v= GUMP::is_valid($_POST,[
            'email'=>'required',
        ]);
        if($v==1){
            $user=new user();

            $data=$user->getUser($_POST['email'],$_POST['password']);
            if(!empty($data)){
                Session::Set('user',$data);
               // header("LOCATION: ../user/index");
            helper::redirect("user/index");
            }else{
                echo "why you don't go fuck yourself";}
        }else{
            echo "why you don't enter a fucking password";}


    }
    
}


