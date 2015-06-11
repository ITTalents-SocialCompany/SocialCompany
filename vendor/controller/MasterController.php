<?php
class MasterController {

    public function renderView($view, $post = array(), $title = ""){
        require_once 'views/layouts/header.php';
        require_once "views/$view.php";
        require_once 'views/layouts/footer.php';
    }

    protected function redirect($url){
        return header("Location: $url");
    }

    protected function takeFields($arr){
        return implode(",",array_keys($arr));
    }

    public function renderViewWithError($view, $post = array(), $error, $title = ""){
        require_once 'views/layouts/header.php';
        require_once 'views/layouts/error.php';
        require_once "views/$view.php";
        require_once 'views/layouts/footer.php';
    }
} 