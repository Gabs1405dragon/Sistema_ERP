<?php 

class MySql{
    private static $pdo;

    public static function connect(){
        if(self::$pdo == null){
            try{
                self::$pdo = new \PDO('mysql:dbname=base2;host=localhost;port=3332','root','123456',array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            }catch(\Exception $e){
                echo 'erro ao conectar';
                error_log($e->getMessage());
            }
        }
        return self::$pdo;
    }


}



?>