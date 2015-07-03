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
        $this->renderView("admin/user/users", array("users"), array($users));
    }

    public function deletedUsers(){
        $user = new User();
        $users = $user->getAllUsersDeleted();
        $this->renderView("admin/user/usersDelete", array("users"), array($users));
    }

    public function teams(){
        $team = new Team();
        $teams = $team->getAllTeams();
        $this->renderView("admin/team/teams", array("teams"), array($teams));
    }

    public function addTeam(){
        $this->renderView("admin/team/addTeam");
    }

    public function teamPost($post){
        $fields = $this->takeFields($post);

        $team = new Team();
        $team->setName($post['name']);
        $team->save($team, $fields);

        $this->redirect("/admin/teams");
    }

    public function categories(){
        $category = new Category();
        $categories = $category->getAllCategories();
        $this->renderView("admin/category/categories", array("categories"), array($categories));
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

    public function makeAdmin($args){
        $id = $args[0];
        $user = new User();
        $user->makeAdmin($id);
    }

    public function approveUser($args){
        $id = $args[0];
        $user = new User();
        $user->approve($id);
    }

    public function usersTeam(){
        $team = new Team();
        $user = new User();
        $users = $user->getAllUsersForAdminTeams();
        $teams = $team->getAllTeams();
        $this->renderView("admin/team/usersTeam", array("teams", "users"), array($teams, $users));
    }

    public function addUserToTeamPost($post){
        $fields = $this->takeFields($post);

        $user_team = new UserTeam();
        $user_team->setTeamId($post['team_id']);
        $user_team->setUserId($post['user_id']);

        if($user_team->save($user_team, $fields) > 0){
            $this->redirect("/admin/teams");
        }else{
            $team = new Team();
            $user = new User();
            $users = $user->getAllUsersForAdmin();
            $teams = $team->getAllTeams();
            $this->renderView("/admin/team/usersTeam", array("teams", "users"), array($teams, $users), "User is in this team!");
        }
    }

} 