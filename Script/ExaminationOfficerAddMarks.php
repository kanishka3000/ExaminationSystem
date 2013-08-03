<?php

session_start();
require_once("../class/Exam.php");
require_once("../class/Mark.php");
$exams=unserialize($_SESSION['Exam1']);
$marks=$exams->getMarkElements();
foreach($marks as $mark){
    $myPap =$mark->RegistrationNo."-Pa";
    $myAss= $mark->RegistrationNo."-As";
    $mark->Paper=$_POST["$myPap"];
    $mark->Assignment=$_POST["$myAss"];
    $bool=$mark->saveExamMarks();
    //print_r($mark);
}
if($bool){
         header("location:../ExaminationOfficer.php");
    }else{
        //echo "The operation failed. Requires manual assistance.<br/>Fatal Error";
         header("location:../ExaminationOfficer.php");
    }
//print_r($marks);
//print_r($_POST);

?>
