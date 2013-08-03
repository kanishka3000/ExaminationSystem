<?php
session_start();
require_once("../class/Examination.php");
$examination=unserialize($_SESSION['Examination']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <b>Process Carried out......</b><br/>
    The following information was saved<br/>
        <?php
        echo "Exam saved as:$examination->Exa_id--Name:$examination->ExaminationName--Year:$examination->year--semester:$examination->Semester";
       echo "<br/>Subjects";
       $subs=$examination->Exams;
       if(is_array($subs)){

           foreach($subs as $sub){
               echo "Subject:$sub->Sub_id<br/>";
               echo "Exam id:$sub->Examid<br/>";
               echo "";
           }
       }
     //  print_r($examination);
        ?>
        <br/>
        Continue.....<br/>
        <a href="../EExaminationOfficerAddNewExam.php">OK</a>
    </body>
</html>
