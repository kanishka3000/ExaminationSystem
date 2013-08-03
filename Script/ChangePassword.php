<?php
session_start();
require_once("../class/Login.php");
$user=unserialize($_SESSION['user']);
//print_r($user);
if(isset($_POST['oldpassword'])){
    $username=$_POST['username'];
    $oldpassword=$_POST['oldpassword'];
    //$cpass=$_POST['passconf'];
   // echo $oldpassword;
    $newpassword=$_POST['newpassword'];
//    echo $newpassword;
//    echo $user->Password;
   
    if($user->Password==$oldpassword ){
        
        $user1=$user->changePassword( $username, $oldpassword, $newpassword);
        //echo 1;
        if($user1){
          
        }
        header("location:../ChangePassword.php");
    }
    else{
    
    }
}
    header("location:Logout.php");
?>
