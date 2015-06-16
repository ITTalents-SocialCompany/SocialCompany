<?php
class ProfileController extends MasterController {

    public function __construct(){}

    public function index(){
        $user_detail = new UserDetail();
        if(!$user_detail->hasUserDetail()){
            $this->redirect("/profile/edit");
        }else{
            $id = Auth::getId();
            $user = new User();
            $user = $user->getUser($id);
            $user_detail = $user_detail->getUserDetail($id);
            $this->renderViewWithParams("profile/index", array("user_detail", "user"), array($user_detail, $user));
        }
    }

    public function user($args){
        $username = $args[0];
        $user = new User();
        $user = $user->findByUsername($username);
        $user_detail = new UserDetail();
        $user_detail = $user_detail->getUserDetail($user->user_id);
        $this->renderViewWithParams("profile/index", array("user_detail", "user"), array($user_detail, $user));
    }

    public function edit(){
        $id = Auth::getId();
        $user_detail = new UserDetail();
        $user_detail = $user_detail->getUserDetail($id);
        $this->renderViewWithParams("profile/edit", array("user_detail"), array($user_detail));
    }

    public function editPost($post){

        $user_detail = new UserDetail();
        $user_detail->setAge($post['age']);
        $user_detail->setEmail($post['email']);
        $user_detail->setUserId($post['user_id']);

        if(!$user_detail_id = $user_detail->hasUserDetail()){
            $fields = $this->takeFields($post);
            if($user_detail->save($user_detail, $fields)){
                $this->redirect("/profile/index");
            }else{
                $this->renderViewWithError("profile/edit", "user_detail",$user_detail, "Error!");
            }
        }else{
            $fields = $this->takeFieldsArr($post);
            if($user_detail->change($user_detail, $fields, $user_detail_id)){
                $this->redirect("/profile/index");
            }else{
                $this->renderViewWithError("profile/edit", "user_detail", $user_detail, "Error with Update!");
            }
        }
    }

    public function imgs(){
        $user_detail = new UserDetail();
        if(!$user_detail->hasUserDetail()){
            $this->redirect("/profile/edit");
        }else{
            $id = Auth::getId();
            $user_detail = $user_detail->getUserDetail($id);
            $this->renderViewWithParams("profile/changeImgs", array("user_detail"), array($user_detail));
        }
    }

    public function changeImgs(){
        $id = Auth::getId();
        $user_detail = new UserDetail();
        $user = new User();
        $user = $user->getUser($id);
        $folder = "/storage/imgs/$user->username";
        $user_detail = $user_detail->getUserDetail($id);
        $fields = array();

        if(strcmp($_FILES['profile_img_url']['name'], "") !== 0){
            $fields[] = "profile_img_url";
            $filenameProfile = $_FILES['profile_img_url']['tmp_name'];
            $realFilenameProfile = $_FILES['profile_img_url']['name'];
            $profileFilePath = "/storage/imgs/$user->username/$realFilenameProfile";
            $user_detail->setProfileImg($profileFilePath);
        }

        if(strcmp($_FILES['cover_img_url']['name'], "") !== 0){
            $fields[] = "cover_img_url";
            $filenameCover = $_FILES['cover_img_url']['tmp_name'];
            $realFilenameCover = $_FILES['cover_img_url']['name'];
            $coverFilePath = "/storage/imgs/$user->username/$realFilenameCover";
            $user_detail->setCoverImg($coverFilePath);
        }

        $user_detail_id = $user_detail->hasUserDetail();
        if($user_detail->changeImgs($user_detail, $fields, $user_detail_id)){
            if(isset($filenameProfile)) {
                $this->saveImg($filenameProfile, $profileFilePath, $folder);
            }
            if(isset($filenameCover)){
                $this->saveImg($filenameCover, $coverFilePath, $folder);
            }
            $this->redirect("/profile/index");
        }else{
            $this->redirect("/profile/imgs");
        }
    }

} 