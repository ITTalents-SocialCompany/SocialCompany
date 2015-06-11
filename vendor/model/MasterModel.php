<?php

class MasterModel {
    private $dbConn;

    public function __construct(){
        $db = new DBConnect();
        $this->dbConn = $db->getInstance();
    }

    public function insert($table, $fields,array $data)
    {
        if(isset($data['table'])){
            unset($data['table']);
        }
        $values = array_values($data);

        $query = "INSERT INTO " . $table . " (" . $fields . ") " . " VALUES (" .
            rtrim(str_repeat("?,", count($values)), ",") . ")";

        $prep = $this->dbConn->prepare($query);
        return $prep->execute($values);
    }

    public function update(){
        //TODO
    }

    public function select($table, $where = "", $fields = "*", $order = "", $limit = null, $offset = null){
        $query = "SELECT " . $fields . " FROM " . $table
               . (($where) ? " WHERE " . $where : "")
               . (($limit) ? " LIMIT " . $limit : "")
               . (($offset && $limit) ? " OFFSET " . $offset : "")
               . (($order) ? " ORDER BY " . $order : "");
        return $this->dbConn->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(){
        //TODO
    }

    public function findByUsername($table, $username){
        return $this->select($table, "username = '$username'");
    }

    public function findById($table, $id){
        return $this->select($table, "id = '$id'");
    }
} 