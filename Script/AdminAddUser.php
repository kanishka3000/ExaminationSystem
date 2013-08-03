<?php

session_start();
require_once("../class/Login.php");
if($_POST['username']){
    $UserName=$_POST['username'];
    $PassWord=$_POST['Password'];
    $Name=$_POST['Name'];
    $Address=$_POST['Add'];
    $Tpno=$_POST['Tpno'];
    $Nic=$_POST['Nic'];
    $AccessLevel=$_POST['Usertype'];
    $log=new Login();
    $log->UserName=$UserName;
    $log->Password=$PassWord;
    $log->AccessLevel=$AccessLevel;
    $log->Name=$Name;
    $log->Address=$Address;
    $log->Tpno=$Tpno;
    $log->Nic=$Nic;
  $bool= $log->setUser();
  if($bool){
      header("location:../Admin.php");
  }


}
else{
  if(isset($_GET['remove'])){
      $users=unserialize($_SESSION['user']);
      $re=$_GET['remove'];
     // print_r($users);
     // echo $re;
      
      foreach($users as $usr){
          if($usr->UserName==$re){
              $usr->removeUser();
          }
      }


      header("location:../Admin.php");
  }

}
?>
