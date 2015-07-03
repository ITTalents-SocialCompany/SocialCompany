<?php
class DBConnect{
    private static $db;
    private static $instace;

    private function __construct(){

        try{
            $db = new PDO(DNS, DB_USER, DB_PASS);

            self::$db = $db;
        }catch (PDOException $e){
            header("Location: /home/errorDb");
        }
    }

    public static function getInstance() {
        if(self::$instace === null){
            self::$instace = new DBConnect();
        }
        return self::$instace;
    }

    public static function getDb(){
        return self::$db;
    }
}