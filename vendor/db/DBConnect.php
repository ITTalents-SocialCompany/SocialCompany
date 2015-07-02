<?php
class DBConnect{
    private static $db;
    private static $instace;

    private function __construct(){

        try{
            $db = new PDO(DNS, DB_USER, DB_PASS);

            //Comment next row when app is in production
    //        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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