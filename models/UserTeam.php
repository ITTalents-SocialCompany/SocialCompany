<?php
class UserTeam extends MasterModel{
    private $user_id;
    private $team_id;
    private $table = "users_teams";

    public function __get($name) {
        return $this->$name;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function setTeamId($team_id){
        $this->team_id = $team_id;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(UserTeam $user_team, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('UserTeam', $key)){
                $user_team->$key = $value;
            }
        }
        return $user_team;
    }

    public function save(UserTeam $user_team, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($user_team));
    }
} 