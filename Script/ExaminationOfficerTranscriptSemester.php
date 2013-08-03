<?php
session_start();
require_once("../class/YearlyReport.php");
if(isset($_REQUEST['final'])){
    $Ac_id=$_REQUEST['course'];
    //$Year=$_REQUEST['year'];


    $_SESSION['ActiveCourse']=$Ac_id;
    //$_SESSION['Year']=$Year;
    //$_SESSION['Semester']=$Semester;
    $courses=unserialize($_SESSION['Courses']);
    $course=$courses[$Ac_id];
    //print_r($course);
    $student=new Student();
    $students=$student->getAllActiveStudents($course);
    $_SESSION['Students']=serialize($students);
    //print_r($students);
    //  print_r($course);
header("location:../ExaminationOfficerTranscriptSemester2.php");
}
    ?>
