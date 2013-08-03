<?php
session_start();
require_once("../class/Student.php");
$student=unserialize($_SESSION['student']);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        Student Registration
        <?php
        if(!($student->SaveError)){
            echo "Student Registration Succeeded<br/>";
            echo "Would You like to register the student for a course";
            echo "<a href=\"../RegistrationOfferRegisterCourse.php?loadstudent=true\">Yes</a>";
            // print_r($student);

        }else{
            echo "Registration Failure<br/>";
            if(is_array($student->SaveError)){
                foreach($student->SaveError as $ster){
                    echo "$ster";
                }

            }
        }
        ?>
        <br/>
        Would you like to Register another student <br/>
        &nbsp;
        <a href="../RegistrationOfficerRegisterStudent.php">Register Student</a>
    </body>
</html>
