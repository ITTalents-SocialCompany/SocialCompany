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
        $users = $user->getAllUsersForAdmin();
        $this->renderViewWithParams("admin/user/users", array("users"), array($users));
    }

    public function teams(){
        $team = new Team();
        $teams = $team->getAllTeams();
        $this->renderViewWithParams("admin/team/teams", array("teams"), array($teams));
    }

    public function addTeam(){
        $this->renderView("admin/team/addTeam");
    }

    public function teamPost($post){
        $fields = $this->takeFields($post);

        $team = new Team();
        $team->setName($post['name']);
        $team->save($team, $fields);

        $this->redirect("/admin/team/teams");
    }

    public function categories(){
        $category = new Category();
        $categories = $category->getAllCategories();
        $this->renderViewWithParams("admin/category/categories", array("categories"), array($categories));
    }

    public function addCategory(){
        $this->renderView("admin/category/addCategory");
    }

    public function categoryPost($post){
        $fields = $this->takeFields($post);

        $category = new Category();
        $category->setName($post['name']);
        $category->save($category, $fields);

        $this->redirect("/admin/categories");
    }

    public function deleteUser($args){
        $id = $args[0];
        $user = new User();
        $user->soft_delete($id);
    }

    public function approveUser($args){
        $id = $args[0];
        $user = new User();
        $user->approve($id);
    }

    public function usersTeam(){
        $team = new Team();
        $user = new User();
        $users = $user->getAllUsers();
        $teams = $team->getAllTeams();
        $this->renderViewWithParams("admin/team/usersTeam", array("teams", "users"), array($teams, $users));
    }

    public function addUserToTeamPost($post){
        $fields = $this->takeFields($post);

        $user_team = new UserTeam();
        $user_team->setTeamId($post['team_id']);
        $user_team->setUserId($post['user_id']);

        $user_team->save($user_team, $fields);

        $this->redirect("/teams");
    }

} 