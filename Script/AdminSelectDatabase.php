<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once("../class/Connection.php");
if(isset($_REQUEST['dbtype'])){
    if($_REQUEST['dbtype']=="secondary"){
        Connection::changeDatabase();
Connection::$DBHost="10.16.32.205";
        //}elseif($_REQUEST['dbtype']=="primary"){
        //    Connection::resetDatabase();
        //}
    }
  
    //header("location:../AdminSelectDatabase.php");
}  echo Connection::$DBHost;
    ?>
