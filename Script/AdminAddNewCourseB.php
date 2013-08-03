<?php
session_start();
require_once("../class/AddCourse.php");
$cour=unserialize($_SESSION['Course']);
$courses=$cour->CourseYears;
$CurrCourse=$courses[$cour->CurrNo];
$CurrSubjects=$CurrCourse->Subjects;
if(isset($_REQUEST['second'])){
//    print_r($CurrSubjects);
//   print_r($cour);
foreach($CurrSubjects as $CurrSubject){
    $name="n$CurrSubject->Sub_id";
    $minatt="a$CurrSubject->Sub_id";
    $semester="s$CurrSubject->Sub_id";
    $CurrSubject->SubjectName=$_REQUEST[$name];
    $CurrSubject->minimumAttendance=$_REQUEST[$minatt];
    $CurrSubject->semester=$_REQUEST[$semester];
}
$cour->CurrNo++;
$_SESSION['Course']=serialize($cour);
if(($cour->CurrNo)<($cour->Years+1)){
//echo "<a href=\"\">OK</a>";
header("location:../AdminAddNewCourseB.php");
}else{
    header("location:../AdminAddNewCourseC.php");
}
}
?>
