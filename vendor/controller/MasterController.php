<?php
class MasterController {

    protected function renderView($view){
        require_once 'views/layouts/header.php';
        require_once "views/$view.php";
        require_once 'views/layouts/footer.php';
    }

    protected function redirect($url){
        return header("Location: $url");
    }
} 