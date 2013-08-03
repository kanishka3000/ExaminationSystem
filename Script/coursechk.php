<?php
require("../class/Login.php");

$id=$_POST['user_name'];
$bt=new Login;
$bool=$bt->checkCourse($id);

if ($bool)
{

	echo "no";
} 
else
{
	
	echo "yes";
}
?>