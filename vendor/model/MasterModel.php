<?php

abstract class MasterModel {
    private $dbConn;

    public function __construct(){
        $dbIntance = DBConnect::getInstance();
        $this->dbConn = $dbIntance::getDb();
    }

    public function insert($table, $fields, array $data){
        if(isset($data['table'])){
            unset($data['table']);
        }
        foreach($data as $value){
            if(!is_null($value)){
                $values[] = $value;
            }
        }

        $query = "INSERT INTO " . $table . " (" . $fields . ") " . " VALUES (" .
            rtrim(str_repeat("?,", count($values)), ",") . ")";

//       var_dump($query);
        $prep = $this->dbConn->prepare($query);
        $prep->execute($values);
        return $this->dbConn->lastInsertId();
    }

    public function update($table, array $fields, array $data, $where = ""){
        if(isset($data['table'])){
            unset($data['table']);
        }

        if(isset($data['user_id'])){
            unset($data['user_id']);
        }
        $set = array();
        $values = array();

        foreach ($data as $field => $value) {
            if(in_array($field, $fields) && !is_null($value) && !is_bool($value)){
                $set[] = $field . '=' . "?";
                $values[] = $value;
            }elseif($value === false){
                $set[] = $field . '=' . "?";
                $values[] = "0";
            }elseif($value === true){
                $set[] = $field . '=' . "?";
                $values[] = "1";
            }elseif($value === null){
                $set[] = $field . '=' . "?";
                $values[] = null;
            }
        }
        $set = implode(',', $set);
        $query = 'UPDATE ' . $table . ' SET ' . $set
                . (($where) ? ' WHERE ' . $where : '');
        var_dump($query);
        $prep = $this->dbConn->prepare($query);
        return $prep->execute($values);
    }

    public function selectOne($table, $where = "", $fields = "*", $order = "", $group = ""){
        $query = "SELECT " . $fields . " FROM " . $table
               . (($where) ? " WHERE " . $where : "")
               . (($group && strcmp($group, "") !== 0) ? " GROUP BY " . $group : "")
               . (($order) ? " ORDER BY " . $order : "");
//        var_dump($query);
        return $this->dbConn->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll($table, $where = "", $order = "",$fields = "*", $limit = null, $group = ""){
        $query = "SELECT ". $fields ." FROM " . $table
            . (($where && strcmp($where, "") !== 0) ? " WHERE " . $where : "")
            . (($group && strcmp($group, "") !== 0) ? " GROUP BY " . $group : "")
            . (($order && strcmp($order, "") !== 0) ? " ORDER BY " . $order : "")
            . (($limit) ? " LIMIT " . $limit : "");
//         var_dump($query);
        return $this->dbConn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOneWithJoin($table, array $joinTables, array $onFirst, array $onSecond, $where = "", $fields = "*", $order = ""){
        $aliasTable = substr($table, 0, 1);
        $text = "";
        for($i = 0; $i < count($joinTables); $i++){
            $aliasJoinTable = substr($joinTables[$i], 0, 2);
            $text .= " JOIN $joinTables[$i] $aliasJoinTable ON $aliasJoinTable.$onFirst[$i] = $onSecond[$i]";
        }
        $query = "SELECT " . $fields . " FROM " . $table . " " . $aliasTable
            . (($text) ? "$text" : "")
            . (($where) ? " WHERE " . "$aliasTable.$where" : "")
            . (($order) ? " ORDER BY " . $order : "");
        //var_dump($query);
        return $this->dbConn->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    
    public function selectAllWithJoin($table, $joinTable, $on, $joinType, $where = "", $fields = "*",$order = ""){
    	$aliasTable = substr($table, 0, 2);
    	$aliasJoinTable = substr($joinTable, 0, 2);
    	$query = "SELECT " . $fields . " FROM " . $table . " " . $aliasTable
    	. (($joinTable) ? " "
    			. (($joinType) ?  $joinType ." JOIN " : " JOIN ")
    			. $joinTable . " " . $aliasJoinTable : "")
    	. (($on) ? " ON " . "$aliasJoinTable.$on = $aliasTable.$on" : "")
    	. (($where) ? " WHERE " . "$aliasTable.$where" : "")
    	. (($order) ? " ORDER BY " . $order : "");
//     	var_dump($query);
    	return $this->dbConn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAllWithJoins($table, array $joinTables, array $onFirst, array $onSecond, $where = "", $fields = "*",
                                       $order = "", $limit = null){
        $aliasTable = substr($table, 0, 1);
        $text = "";
        for($i = 0; $i < count($joinTables); $i++){
            $aliasJoinTable = substr($joinTables[$i], 0, 2);
            $text .= " JOIN $joinTables[$i] $aliasJoinTable ON $aliasJoinTable.$onFirst[$i] = $onSecond[$i]";
        }

        $query = "SELECT " . $fields . " FROM " . $table . " " . $aliasTable
            . (($text) ? "$text" : "")
            . (($where) ? " WHERE " . "$aliasTable.$where" : "")
            . (($order) ? " ORDER BY " . "$aliasTable.$order" : "")
            . (($limit) ? " LIMIT " . $limit : "");
//    	var_dump($query);
        return $this->dbConn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($table, $where = ''){
        $query = 'DELETE FROM ' . $table
        . (($where) ? ' WHERE ' . $where : '');
        return $this->dbConn->exec($query);
    }

    public function findByUsername($table, $username){
        return $this->selectOne($table, "username = '$username'");
    }

    public function findById($table, $id){
        return $this->selectOne($table, "id = '$id'");
    }
}
