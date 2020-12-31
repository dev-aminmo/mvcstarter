<?php
namespace MVC\core;

class App{
private $controller;
private $method;
private $params;


    public $s=5;
 public function __construct()
 {  
     $this->params=[];
     $this->url();
     $this->render();
    //echo $this->controller;
 }
private function url(){

    if(isset($_SERVER['QUERY_STRING'])){
        $url= explode("/",$_SERVER['QUERY_STRING']);
        //print_r($url);
          if( !empty($url[0])){
          $this->controller=$url[0]."controller";
          }else{
              $this->controller="homecontroller";
          }
          if(!empty($url[1])){
          $this->method=$url[1];
        }else{
            $this->method="index";
        }


        if(isset($url[2])){
             //remove controller and method and lefts [2]=> param1,[3 ]=> param2 ....
              unset($url[0],$url[1]);
              //arr_values makes [2]=> param1,[3 ]=> param2 -----to----> [0]=> param1,[1]=> param2 
               $this->params=array_values($url);
            }

    }

}
private function render(){
    $controller="MVC\controllers\\" . $this->controller;
   // echo $controller;
    if( class_exists($controller)){
        $controller=new $controller;
       if(method_exists($controller,$this->method)){
        call_user_func_array([$controller,$this->method], $this->params);
        }else{
          echo "method_does_not_exists";

        }



    }else{
       echo 'class does not exist';

    }
}

}