<?php
require("../class/Login.php");

$user_type=$_POST['user_type'];
if ($user_type=='ExaminationOfficer'){
$bt=new Login;
$bool=$bt->countExoficers($user_type);

if ($bool)
{

	echo "yes";
}
else
{

	echo "no";
}
}
if($user_type=='RegistrationOfficer'){
$bt=new Login;
$bool=$bt->countRegoficers($user_type);

if ($bool)
{
	
	echo "yes";
}
else
{
	
	echo "no";
}
}
?>