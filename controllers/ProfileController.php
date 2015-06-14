<?php
class ProfileController extends MasterController {
    private $auth;
    private $userInfo;

    public function __construct(){
        $this->auth = new Auth();
        $this->userInfo = new UserInfo();
    }

    public function index(){
        if(!$this->userInfo->hasProfile()){
            $this->redirect("/profile/edit");
        }else{
            $id = $this->auth->getUserId();
            $user = $this->userInfo->getLoggedUser($id);
            $profile_detail = $this->userInfo->getProfile($id);
            $this->renderViewWithParams("profile/index", array("profile_detail", "user"), array($profile_detail, $user));
        }
    }

    public function edit(){
        $id = $this->auth->getUserId();
        $profile_detail = $this->userInfo->getProfile($id);
        $this->renderViewWithParams("profile/edit", array("profile_detail"), array($profile_detail));
    }

    public function editPost($post){

        $profile_detail = new ProfileDetail();
        $profile_detail->setAge($post['age']);
        $profile_detail->setEmail($post['email']);
        $profile_detail->setUserId($post['user_id']);

        if(!$profile_detail_id = $this->userInfo->hasProfile()){
            $fields = $this->takeFields($post);
            if($profile_detail->save($profile_detail, $fields)){
                $this->redirect("/");
            }else{
                $this->renderViewWithError("profile/edit", "profile_detail",$profile_detail, "Error!");
            }
        }else{
            $fields = $this->takeFieldsArr($post);
            if($profile_detail->change($profile_detail, $fields, $profile_detail_id)){
                $this->redirect("/profile/index");
            }else{
                $this->renderViewWithError("profile/edit", "profile_detail", $profile_detail, "Error with Update!");
            }
        }
    }

    public function imgs(){
        $this->renderView("profile/changeImgs");
    }

    public function changeImgs($post){
        $id = $this->auth->getUserId();
        $user = $this->userInfo->getLoggedUser($id);
        $folder = "/storage/imgs/$user->username";

        $filenameProfile = $_FILES['profile_img_url']['tmp_name'];
        $realFilenameProfile = $_FILES['profile_img_url']['name'];
        $profileFilePath = "/storage/imgs/$user->username/$realFilenameProfile";

        $filenameCover = $_FILES['cover_img_url']['tmp_name'];
        $realFilenameCover = $_FILES['cover_img_url']['name'];
        $coverFilePath = "/storage/imgs/$user->username/$realFilenameCover";

        $profile_detail = new ProfileDetail();
        $profile_detail->setProfileImg($profileFilePath);
        $profile_detail->setCoverImg($coverFilePath);

        $profile_detail_id = $this->userInfo->hasProfile();
        if($profile_detail->changeImgs($profile_detail, array("profile_img_url", "cover_img_url"), $profile_detail_id)){
            if($this->saveImg($filenameProfile, $profileFilePath, $folder) &&
            $this->saveImg($filenameCover, $coverFilePath, $folder)){
                $this->redirect("/profile/index");
            }
        }
    }

} 