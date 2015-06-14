<?php
class MasterController {

    public function __construct(){
        $userInfo = new UserInfo();
        if(!$userInfo->hasProfile()){
            $this->redirect("/profile/edit");
        }
    }

    public function renderView($view, $post = array()){
        require_once 'views/layouts/header.php';
        require_once "views/$view.php";
        require_once 'views/layouts/footer.php';
    }

    public function renderViewAjax($view, array $params, array $arr){
        for($i = 0; $i < count($params); $i++){
            $$params[$i] = $arr[$i];
        }
        require_once "views/$view.php";
    }

    protected function redirect($url){
        return header("Location: $url");
    }

    protected function takeFields($arr){
        return implode(",",array_keys($arr));
    }

    protected function takeFieldsArr($arr){
        return array_keys($arr);
    }

    public function renderViewWithError($view, $param, $obj, $error){
        $$param = $obj;

        require_once 'views/layouts/header.php';
        require_once 'views/layouts/error.php';
        require_once "views/$view.php";
        require_once 'views/layouts/footer.php';
    }

    public function renderViewWithParams($view, array $params, array $arr){
        for($i = 0; $i < count($params); $i++){
            $$params[$i] = $arr[$i];
        }

        require_once 'views/layouts/header.php';
        require_once "views/$view.php";
        require_once 'views/layouts/footer.php';
    }

    public function saveImg($filename, $filePath, $folder){
        $folder = ltrim ($folder, '/');
        $filePath = ltrim($filePath, '/');
        if(!file_exists("storage/imgs")){
            mkdir("storage/imgs");
        }

        if(!file_exists("$folder")){
            mkdir("$folder");
        }
        if(is_uploaded_file($filename)){
            if (move_uploaded_file($filename, "$filePath")){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
} 