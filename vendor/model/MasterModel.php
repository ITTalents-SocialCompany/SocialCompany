<?php

abstract class MasterModel {
    private $dbConn;

    public function __construct(){
        $db = new DBConnect();
        $this->dbConn = $db->getInstance();
    }

    public function insert($table, $fields, array $data)
    {
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

//        var_dump($query);

        $prep = $this->dbConn->prepare($query);
        return $prep->execute($values);
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
            if(in_array($field, $fields) && !is_null($value)){
                $set[] = $field . '=' . "'$value'";
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

    public function selectAll($table, $where = "", $order = "", $limit = null, $offset = null){
        $query = "SELECT * FROM " . $table
            . (($where) ? " WHERE " . $where : "")
            . (($limit) ? " LIMIT " . $limit : "")
            . (($offset && $limit) ? " OFFSET " . $offset : "")
            . (($order) ? " ORDER BY " . $order : "");
        return $this->dbConn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOneWithJoin($table, $joinTable, $on, $where = "", $fields = "*"){
        $aliasTable = substr($table, 0, 2);
        $aliasJoinTable = substr($joinTable, 0, 2);
        $query = "SELECT " . $fields . " FROM " . $table . " " . $aliasTable
            . (($joinTable) ? " LEFT JOIN " . $joinTable . " " . $aliasJoinTable : "")
            . (($on) ? " ON " . "$aliasJoinTable.$on = $aliasTable.$on" : "")
            . (($where) ? " WHERE " . "$aliasTable.$where" : "");
//        var_dump($query);
        return $this->dbConn->query($query)->fetch(PDO::FETCH_ASSOC);
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