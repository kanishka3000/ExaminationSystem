<?php
require("../class/Login.php");

$user_name=$_POST['user_name'];
$bt=new Login;
$bool=$bt->checkUsername($user_name);

if ($bool)
{

	echo "no";
} 
else
{
	
	echo "yes";
}
?>