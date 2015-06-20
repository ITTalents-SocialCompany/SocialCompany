<?php
class AdminController extends MasterController{
    public function __construct(){
        parent::__construct();
        if(!Auth::isAdmin()){
            $this->redirect("/");
        }
    }

    public function index(){
        $this->renderView("admin/index");
    }

    public function users(){
        $user = new User();
        $users = $user->getAllUsers();
        $this->renderViewWithParams("admin/users", array("users"), array($users));
    }

    public function delete($args){
        $id = $args[0];
        $user = new User();
        $user->soft_delete($id);
    }

    public function approve($args){
        $id = $args[0];
        $user = new User();
        $user->approve($id);
    }

} 