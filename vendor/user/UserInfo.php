<?php
class UserInfo extends MasterModel{
    private $auth;

    public function __construct(){
        parent::__construct();
        $this->auth = new Auth();
    }

    public function getLoggedUser($id){
        $user = new User();

        $userInfo = $this->getUserInfo($id);
        $user = $user->arrayToObject($user, $userInfo);

        return $user;
    }

    public function getUserInfo($id){
        return $this->selectOneWithJoin("users", "profile_details", "user_id", "user_id = $id");
    }

    public function getProfile($id){
        $profile_detail = new ProfileDetail();

        $userInfo = $this->getUserInfo($id);
        $profile_detail = $profile_detail->arrayToObject($profile_detail, $userInfo);

        return $profile_detail;
    }

    public function hasProfile(){
        $id = $this->auth->getUserId();
        return $this->selectOne("profile_details", "user_id = '$id'") ?
            $this->selectOne("profile_details", "user_id = '$id'")['profile_detail_id'] : false;
    }
} 