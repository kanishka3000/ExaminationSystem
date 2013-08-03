<?php
session_start();
require_once("../class/Course.php");
require_once("../class/Student.php");
if(isset($_REQUEST['course'])){
    $courses=unserialize($_SESSION['courses']);
    $cs= $_REQUEST['course'];
    //echo $cs;
    $course=$courses[$cs];
  //  print_r($course);
$student=new Student();
$stu=$student->getAllActiveStudents($course);
$_SESSION['students']=serialize($stu);
$course->setSubjects();
$Ac_id=$course->Ac_id;
$subs=$course->getExamSubjects($Ac_id);
//$subs=$course->getSubjects();
$_SESSION['subjects']=serialize($subs);
header("location:../EExaminationOfficerRegisterForExamB.php");
}
?>
