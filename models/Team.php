<?php
class Team extends MasterModel{
    private $team_id;
    private $name;
    private $team_members_str;
    private $table = "teams";

    public function __get($name) {
        return $this->$name;
    }

    public function setName($name){
        $this->name = strip_tags($name);
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(Team $team, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('Team', $key)){
                $team->$key = $value;
            }
        }
        return $team;
    }

    public function save(Team $team, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($team));
    }

    public function getAllTeams(){
        $rows = $this->selectAll("team_view", "", "", "team_id, name, group_concat(username, ' ') as team_members_str", null, "team_id");
        if(count($rows) > 0){
            foreach($rows as $row){
                $team = new Team();
                $team = $this->arrayToObject($team, $row);
                $teams[] = $team;
            }

            return $teams;
        }else{
            $rows = $this->selectAll($this->table);
            foreach($rows as $row){
                $team = new Team();
                $team = $this->arrayToObject($team, $row);
                $teams[] = $team;
            }

            return $teams;
        }
    }
}