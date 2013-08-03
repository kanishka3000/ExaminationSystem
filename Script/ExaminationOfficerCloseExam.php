<?php

session_start();
require_once("../class/Exam.php");
require_once("../class/Examination.php");
if(isset($_REQUEST['exam'])){
    $Examid=$_REQUEST['exam'];
    $exams=unserialize($_SESSION['Exams']);
    $exam=$exams[$Examid];
    $exam->closeExamination();
    //print_r($exam);

//  $ex=new Exam();
//  $bool=$ex->closeExam($Examid);
//  if($bool){
//     // echo "success fully closed";
//      unset ($_SESSION['Exam']);
      
//  }
    
}
header("location:../ExaminationOfficerCloseExam.php");


?>
