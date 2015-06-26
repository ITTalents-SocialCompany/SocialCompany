<?php

abstract class MasterModel {
    private $dbConn;

    public function __construct(){
        $dbIntance = DBConnect::getInstance();
        $this->dbConn = $dbIntance::getDb();
    }

    public function insert($table, $fields, array $data){
//        $this->dbConn = DBConnect::getInstance();
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

//        var_dump($this->dbConn);

        $prep = $this->dbConn->prepare($query);
        $prep->execute($values);
        return $this->dbConn->lastInsertId();
    }

    public function update($table, $fields, array $data, $where = ""){
        if(isset($data['table'])){
            unset($data['table']);
        }

        if(isset($data['user_id'])){
            unset($data['user_id']);
        }
        $set = array();
        foreach ($data as $field => $value) {
            if(in_array($field, $fields) && !is_null($value) && !is_bool($value)){
                $set[] = $field . '=' . "'$value'";
            }elseif($value === false){
                $set[] = $field . '=' . "0";
            }elseif($value === true){
                $set[] = $field . '=' . "1";
            }elseif($value === null){
                $set[] = $field . '=' . "NULL";
            }
        }
        $set = implode(',', $set);
        $query = 'UPDATE ' . $table . ' SET ' . $set
                . (($where) ? ' WHERE ' . $where : '');
//        var_dump($query);
        return $this->dbConn->exec($query);
    }

    public function selectOne($table, $where = "", $fields = "*", $order = "", $limit = null, $offset = null){
        $query = "SELECT " . $fields . " FROM " . $table
               . (($where) ? " WHERE " . $where : "")
               . (($limit) ? " LIMIT " . $limit : "")
               . (($offset && $limit) ? " OFFSET " . $offset : "")
               . (($order) ? " ORDER BY " . $order : "");
//        var_dump($query);
        return $this->dbConn->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll($table, $where = "", $order = "", $limit = null){
        $query = "SELECT * FROM " . $table
            . (($where && strcmp($where, "") !== 0) ? " WHERE " . $where : "")
            . (($order && strcmp($order, "") !== 0) ? " ORDER BY " . $order : "")
            . (($limit) ? " LIMIT " . $limit : "");
//         var_dump($query);
        return $this->dbConn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAllWithJoin($table, $joinTable, $on, $where = "", $fields = "*"){
        $aliasTable = substr($table, 0, 1);
        $aliasJoinTable = substr($joinTable, 0, 2);
        $query = "SELECT " . $fields . " FROM " . $table . " " . $aliasTable
            . (($joinTable) ? " JOIN " . $joinTable . " " . $aliasJoinTable : "")
            . (($on) ? " ON " . "$aliasJoinTable.$on = $aliasTable.$on" : "")
            . (($where) ? " WHERE " . "$aliasTable.$where" : "")
            . (($order) ? " ORDER BY " . $order : "");
        //var_dump($query);
        return $this->dbConn->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    
    public function selectAllWithJoin($table, $joinTable, $on, $where = "", $fields = "*",$order = ""){
    	$aliasTable = substr($table, 0, 2);
    	$aliasJoinTable = substr($joinTable, 0, 2);
    	$query = "SELECT " . $fields . " FROM " . $table . " " . $aliasTable
    	. (($joinTable) ? " LEFT JOIN " . $joinTable . " " . $aliasJoinTable : "")
    	. (($on) ? " ON " . "$aliasJoinTable.$on = $aliasTable.$on" : "")
    	. (($where) ? " WHERE " . "$aliasTable.$where" : "")
    	. (($order) ? " ORDER BY " . $order : "");
    	//var_dump($query);
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
