<?php
class ProfileDetail extends MasterModel{
    private $age;
    private $email;
    private $profile_img_url;
    private $cover_img_url;
    private $user_id;
    private $table = "profile_details";

    public function __get($name) {
        return $this->$name;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setProfileImg($profile_img_url){
        $this->profile_img_url = $profile_img_url;
    }

    public function setCoverImg($cover_img_url){
        $this->cover_img_url = $cover_img_url;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(ProfileDetail $profileDetail, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('ProfileDetail', $key)){
                $profileDetail->$key = $value;
            }
        }
        return $profileDetail;
    }

    public function save(ProfileDetail $profile_detail, $fields){
        return $this->insert($this->table, $fields, $profile_detail->objectToArray());
    }

    public function change(ProfileDetail $profile_detail, $fields, $id){
        return $this->update($this->table, $fields, $profile_detail->objectToArray(), "profile_detail_id = '$id'");
    }

    public function changeImgs(ProfileDetail $profile_detail, $fields, $id){
//        var_dump($profileDetail->objectToArray());
        return $this->update($this->table, $fields, $profile_detail->objectToArray(), "profile_detail_id = '$id'");
    }
} 