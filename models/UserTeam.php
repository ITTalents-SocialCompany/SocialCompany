<?php
class UserTeam extends MasterModel{
    private $team_id;
    private $user_id;
    private $team;
    private $users;
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

    public function setTeam(Team $team){
        $this->team = $team;
    }

    public function addUser(User $user){
        $this->users[] = $user;
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
        $isInTeam = false;
        $team = $this->getTeam($user_team->team_id);
        $teamMembers = explode(",", $team->team_members_str);

        foreach($teamMembers as $teamMember){
            if($teamMember === $this->user_id){
                $isInTeam = true;
            }
        }
        if(!$isInTeam){
            return $this->insert($this->table, $fields, $this->objectToArray($user_team));
        }else{
            return false;
        }
    }

    public function getTeam($id){
        $row = $this->selectOne("team_view", "team_id = $id", "team_id, name, group_concat(user_id, '') as team_members_str", "", "team_id");
        if($row !== false){
            $team = new Team();
            $team = $team->arrayToObject($team, $row);
            return $team;
        }
    }

    public function getAllUsersByTeam($user_id){
        $teams = $this->selectAllWithJoin($this->table, "teams", "team_id", "", "user_id = $user_id");
        foreach($teams as $team){
            $userTeam = new UserTeam();
            $newTeam = new Team();
            $newTeam->arrayToObject($newTeam, $team);
            $userTeam->setTeam($newTeam);
            $rows = $this->selectAll("team_view", "team_id = ". $team['team_id']);
            foreach($rows as $row){
                $user = new User();
                $user->arrayToObject($user, $row);
                $user_detail = new UserDetail();
                $user_detail->arrayToObject($user_detail, $row);
                $user->addUserDetail($user_detail);
                $userTeam->addUser($user);
            }
            $userTeams[] = $userTeam;
        }
        return $userTeams;
    }
} 