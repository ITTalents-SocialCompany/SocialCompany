<?php
class MasterController {

    public function __construct(){
        $user_detail = new UserDetail();
        if(!$user_detail->hasUserDetail()){
            $this->redirect("/profile/edit");
        }
    }

    public function renderView($view, array $params = null, array $arr = null, $error = null){
        for($i = 0; $i < count($params); $i++){
            $$params[$i] = $arr[$i];
        }

        require_once 'views/layouts/header.php';
        if($error !== null){
            require_once 'views/layouts/error.php';
        }
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
    
    public function swap(&$a, &$b){
    	$temp = $a;
    	$a = $b;
    	$b = $temp;
    }
    
    public function getLocalTime(){
    	$mydate = getdate(date("U"));
    	return "$mydate[year]-$mydate[mon]-$mydate[mday] $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
    }
} 