<?php

session_start();
require("../class/Login.php");
if(isset($_POST['login'])||isset($_POST['password'])){
    $lo=new Login();

    $UserName=$_POST['username'];
    $Password=$_POST['password'];
  //  $Name='nk';
    $user= $lo->checkUser($UserName, $Password);
    $_SESSION['user']=serialize($user);

   // print_r($user);
    switch($user->AccessLevel){
        case 'Administrator':$_SESSION['LOG']="A";header("location:../Admin.php");break;
        case 'ExaminationOfficer':$_SESSION['LOG']="E";$_SESSION['Exnm']=$user->Name;header("location:../ExaminationOfficer.php");break;
        case 'RegistrationOfficer':$_SESSION['LOG']="R";$_SESSION['regn']=$user->Name;header("location:../Registrationofficer.php");break;
      //  case 'Officer':$_SESSION['LOG']=true;header("location:../Officer.php");break;
        default :header("location:../invalid.php");
    }

}
else{
    header("location:index.php");
}
?>
