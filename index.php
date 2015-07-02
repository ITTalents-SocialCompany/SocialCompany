<?php
session_start();

function __autoload($classname) {
    if(strcmp($classname, "UserData") !== 0){
        include_once("models/$classname.php");
    }
}

require_once 'config/config.php';
require_once 'vendor/db/DBConnect.php';
require_once 'vendor/controller/MasterController.php';
require_once 'vendor/model/MasterModel.php';
require_once 'vendor/user/Authentication.php';
require_once 'vendor/user/UserData.php';

$request = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$args = array();
$controller = DEFAULT_CONTROLLER;
$action = DEFAULT_ACTION;

if(isset($request)){

    $requestArgs = explode("/", $request);
	
    if(count($requestArgs) > 1 && strcmp($requestArgs[1], "") !== 0){
        $controller = strtolower($requestArgs[1]);
        $controller = ucfirst($controller);
        $controller .= "Controller";
    }

    if(count($requestArgs) > 2 && strcmp($requestArgs[2], "") !== 0){
        $action = strtolower($requestArgs[2]);
    }

    if(count($requestArgs) > 3 && strcmp($requestArgs[3], "") !== 0){
        $args[] = array_splice($requestArgs, 3);
    }

}

if(file_exists("controllers/$controller.php")){
    require_once "controllers/$controller.php";

    if(class_exists($controller)){
        $controller = new $controller();

        if(method_exists($controller, $action)){
            if($method === "POST"){
                call_user_func_array(array($controller, $action), array($_POST));
            }else{
                call_user_func_array(array($controller, $action), $args);
            }
        }else{
            require_once "views/error/404.php";
        }
    }else{
        require_once "views/error/404.php";
    }
}else{
    require_once "views/error/404.php";
}


