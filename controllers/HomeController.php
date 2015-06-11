<?php
class HomeController extends MasterController{
    public function __construct(){
        Auth::isAuthorized();
    }

    public function index(){
        $this->renderView("home/index");
    }

    public function ajaxRequestNewsFeed(){

    }
} 