<?php
require_once 'config/config.php';
require_once 'vendor/database/DBConnect.php';
require_once 'controllers/MasterController.php';
require_once 'models/Master.php';

$request = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$args = array();
define("FOLDER_PATH", "/SocialNetwork/");

if(isset($request)){

    $requestArgs = explode(FOLDER_PATH, $request);

    $requestArgs = explode("/", $requestArgs[1]);

    if(count($requestArgs) > 0 && strcmp($requestArgs[0], "") !== 0){
        $controller = strtolower($requestArgs[0]);
        $controller = ucfirst($controller);
        $controller .= "Controller";
    }

    if(count($requestArgs) > 1 && strcmp($requestArgs[1], "") !== 0){
        $action = strtolower($requestArgs[1]);
    }

    if(count($requestArgs) > 2 && strcmp($requestArgs[2], "") !== 0){
        $args[] = $requestArgs[2];
    }

}

if(file_exists("controllers/$controller.php")){
    require_once "controllers/$controller.php";

    if(class_exists($controller)){
        $controller = new $controller();

        if(method_exists($controller, $action)){
            if($method === "POST"){
                call_user_func_array(array($controller, $action), $_POST);
            }else{
                call_user_func_array(array($controller, $action), $args);
            }
        }
    }
}
