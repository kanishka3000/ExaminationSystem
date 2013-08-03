<?php
session_start();
require_once("../class/Student.php");
require_once("../class/Mark.php");
$Marks=unserialize($_SESSION['Marks']);
$students=unserialize($_SESSION['students']);
//print_r($Marks);
//print_r($_REQUEST);
if(isset($_REQUEST['repeat'])){
    foreach($Marks as $Mark){
        if(isset($_REQUEST["$Mark->ExamId"])){
            $Mark->setUpdateShy();
            // echo "Ok $Mark->ExamId<br/>";
        }
    }
}
if(count($students)>0){
    header("location:../EExaminationOfficerRegisterForExamB.php");
}else{
    header("location:../EExaminationOfficerRegisterForExamA.php");
}
?>
