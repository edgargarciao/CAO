<?php
class Database
{
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $contMoodle  = null;
    private static $contCao  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }


    public static function connectMoodle()
    {
      return connect('moodle');
    }

    public static function connectCao()
    {
      return connect('cao');
    }
     
    public static function disconnectMoodle()
    {
        self::$contMoodle = null;
    }

     
    public static function disconnectCao()
    {
        self::$contCao = null;
    }

    public static function connect($dbName){
      if(strcmp($dbName,'cao')!==0){
        $cont = self::$contMoodle;
      }else{
        $cont = self::$contMoodle;
      }
      // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }    
}
?>