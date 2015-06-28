<?php
class UserDetail extends MasterModel{
    private $age;
    private $email;
    private $profile_img_url;
    private $cover_img_url;
    private $phone;
    private $gender_id;
    private $user_id;
    private $table = "user_details";

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

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setGenderId($gender_id){
        $this->gender_id = $gender_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(UserDetail $userDetail, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('UserDetail', $key)){
                $userDetail->$key = $value;
            }
        }
        return $userDetail;
    }

    public function save(UserDetail $profile_detail, $fields){
        return $this->insert($this->table, $fields, $profile_detail->objectToArray());
    }

    public function change($profile_detail, $fields, $id){
        return $this->update($this->table, $fields, $profile_detail, "user_detail_id = '$id'");
    }

    public function changeImgs(UserDetail $profile_detail, $fields, $id){
        return $this->update($this->table, $fields, $profile_detail->objectToArray(), "user_detail_id = '$id'");
    }

    public function getUserDetail($id){
        $user_detail = $this->selectOne($this->table, "user_id = '$id'");
        $user_detail = $this->arrayToObject($this, $user_detail);

        return $user_detail;
    }

    public function hasUserDetail(){
        $id = Auth::getId();
        return $this->selectOne($this->table, "user_id = '$id'") ?
            $this->selectOne($this->table, "user_id = '$id'")['user_detail_id'] : false;
    }
}