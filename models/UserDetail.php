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
        if(intval($age) !== 0){
            $this->age = strip_tags($age);
        }else{
            throw new InvalidArgumentException("Age must be a numeric");
        }
    }

    public function setEmail($email){
        if(strcmp($email, "") !== 0 && 
        		filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = strip_tags($email);
        }else{
            throw new InvalidArgumentException("Email can not be empty");
        }
    }

    public function setProfileImg($profile_img_url){
        $this->profile_img_url = strip_tags($profile_img_url);
    }

    public function setCoverImg($cover_img_url){
        $this->cover_img_url = strip_tags($cover_img_url);
    }

    public function setPhone($phone){
        if(intval($phone) !== 0){
            $this->phone = strip_tags($phone);
        }else{
            throw new InvalidArgumentException("Phone must be a numeric");
        }
    }

    public function setGenderId($gender_id){
        $this->gender_id = $gender_id;
    }

    public function setBirthDate($birth_date){
        $this->birthdate = strip_tags($birth_date);
    }

    public function setUniversityName($university_name){
        $this->university_name = strip_tags($university_name);
    }

    public function setUniversitySpec($university_spec){
        $this->university_spec = strip_tags($university_spec);
    }

    public function setSkills($skills){
        $this->skills = strip_tags($skills);
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

    public function validate($post){
        try{
            $this->setAge($post['age']);
            $this->setEmail($post['email']);
            $this->setPhone($post['phone']);
            $this->setGenderId($post['gender_id']);
            $this->setUserId($post['user_id']);
            $this->setBirthDate($post['birthdate']);
            $this->setUniversityName($post['university_name']);
            $this->setUniversitySpec($post['university_spec']);
            $this->setSkills($post['skills']);

            return true;
        }catch (InvalidArgumentException $e){
            return $e->getMessage();
        }
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