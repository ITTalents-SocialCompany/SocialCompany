<?php
class UserDetail extends MasterModel{
    private $age;
    private $email;
    private $profile_img_url;
    private $cover_img_url;
    private $phone;
    private $gender_id;
    private $gender;
    private $birthdate;
    private $university_name;
    private $university_spec;
    private $skills;
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

    public function setBirthDate($birth_date){
        $this->birthdate = $birth_date;
    }

    public function setUniversityName($university_name){
        $this->university_name = $university_name;
    }

    public function setUniversitySpec($university_spec){
        $this->university_spec = $university_spec;
    }

    public function setSkills($skills){
        $this->skills = $skills;
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
            }elseif(strcmp($key, "name") == 0){
                $userDetail->gender = $value;
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
        return $this->update($this->table, $fields, array("profile_img_url" => $profile_detail->profile_img_url,
                "cover_img_url" => $profile_detail->cover_img_url), "user_detail_id = '$id'");
    }

    public function getUserDetail($id){
        $user_detail = $this->selectOneWithJoin($this->table, array("genders"), array("gender_id"), array("u.gender_id"), "user_id = '$id'");
        if($user_detail !== false){
            $user_detail = $this->arrayToObject($this, $user_detail);
            return $user_detail;
        }
        return new UserDetail();
    }

    public function hasUserDetail(){
        $id = Auth::getId();
        return $this->selectOne($this->table, "user_id = '$id'") ?
            $this->selectOne($this->table, "user_id = '$id'")['user_detail_id'] : false;
    }
}