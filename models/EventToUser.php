<?php
class EventToUser extends MasterModel{
    private $event_id;
    private $user_id;
    private $table = "users_events";

    public function __construct($event_id, $user_id){
        parent::__construct();
        $this->setEventId($event_id);
        $this->setUserId($user_id);
    }

    public function __get($name) {
        return $this->$name;
    }

    public function setEventId($event_id){
        $this->event_id = $event_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(EventToUser $event_to_user, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('EventToUser', $key)){
                $event_to_user->$key = $value;
            }
        }
        return $event_to_user;
    }

    public function save($fields){
       // return $this->insert($this->table, $fields, $this->objectToArray($this));
    }

    public function getAllEvent($id){
        //var_dump($this->selectAllWithJoin($this->table, "posts", "post_id", "user_id = $id"));
    }
} 