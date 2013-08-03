<?php
require("../class/Login.php");

$username=$_GET['username'];
$password=$_GET['password'];
//$username="nk";
//$password="nk";

$u=new Login();


    $stf= $u->checkUser($username, $password);
   // echo $stf->UserName;
   if($stf){
      echo "ok";
   }
   else{
echo "no";
    }
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
