<?php

class MasterModel {
    private $dbConn;

    public function __construct(){
        $db = new DBConnect();
        $this->dbConn = $db->getInstance();
    }

    public function insert($table, $obj){
        $query = "INSERT INTO $table ($fields) VALUES ($obj->title)";
        $this->dbConn->exec($query);
    }

    public function update(){

    }

    public function select(){

    }

    public function selectAll(){

    }

    public function delete(){

    }
} 