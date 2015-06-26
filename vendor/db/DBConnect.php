<?php
class DBConnect{
    private static $db;
    private static $instace;

    private function __construct(){

        $db = new PDO(DNS, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $db;
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