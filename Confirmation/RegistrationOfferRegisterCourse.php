<?php
session_start();
require_once("../class/Student.php");
require_once("../class/Course.php");
$student=unserialize($_SESSION['student']);
$activecourse=unserialize($_SESSION['activecourse']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    The student has been registed for the following course;<br/>
        <?php
    echo    $student->RegistrationNo;
        if($activecourse->Error){
            echo "Registration failed due to following reasons<br/>";
            echo $activecourse->Error;
        }else{
            echo "Registraion Successfull";
        }
      // print_r($student);
       //print_r($activecourse);
     
        ?>
        <br/>
     Register Another Student   <a href="../RegistrationOfficerRegisterStudent.php">OK</a><br/>
     Register the same student for another Course<a href="../RegistrationOfferRegisterCourse.php?loadstudent=true">OK</a><br/>
     
Register Another Student for another Course<br/>
<a href="../RegistrationOfferRegisterCourse.php">OK</a>
</body>
</html>
