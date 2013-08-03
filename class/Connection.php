<?php

/**
 * Description of Connection
 *
 * @author Kanishka
 */

class Connection{
    private static $connection;
    private static $db;
    private static $result;
    public static $affectedrows;

    public static $DBHost="localhost";
    private static $Password="123";

    public function testConnection(){

    }

    public static function changeDatabase(){
        $url="10.16.32.205";
        self::$DBHost=$url;
    }
    public static function resetDatabase(){
        $url="localhost";
        self::$DBHost=$url;
    }

    public static  function connect($query){
        $stri=explode($query," ");
        //        if(!($stri[0]=="select")){
        //            self::resetDatabase();
        //        }

        $connection=mysql_connect("$DBHost", "root","$Password") or die("no connection to database".mysql_error());
        $db=mysql_select_db("UCSCEXAM",$connection) or die("connection failed with the database".mysql_error());
        $result=mysql_query($query) or die("qurery failed".mysql_error());
        self:: $affectedrows=mysql_affected_rows();
        mysql_close();
        return $result;
        //note to access static method you need to use the Connect::connect($query);
    }
}
?>
