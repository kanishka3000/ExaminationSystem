<?php
session_start();
require_once("../class/Student.php");
  $student=unserialize($_SESSION['student']);
//print_r($student);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    Information Editing Carried out....<br/>
    For Student
        <?php
       echo "$student->RegistrationNo<br/>";
        ?>
        <a href="../OfficerUpdateStudentInformation.php">OK</a>
    </body>
</html>
