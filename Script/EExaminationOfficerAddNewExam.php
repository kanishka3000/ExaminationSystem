<?php
session_start();
require_once("../class/Course.php");
require_once("../class/Examination.php");
if(isset($_REQUEST['final'])){
  $ex=new Examination();
  $ex->Exa_id=$_REQUEST['examinationId'];
  $ex->ExaminationName=$_REQUEST['examinationName'];
  $ex->StartDate=$_REQUEST['startDate'];
  $ex->EndDate=$_REQUEST['endDate'];
  $ex->TeacherInCharge=$_REQUEST['inCharge'];
  $ex->Location=$_REQUEST['location'];
 $ex->C_id=$_REQUEST['course'];

$subjcts= $ex->setExamination($_REQUEST['course'], $_REQUEST['year'], $_REQUEST['semester']);
 $_SESSION['Examination']=serialize($ex);
header("location:../ExaminationOfficerAddNewExamAN.php");

    
}else{
    
    header("Content-type:text/xml");
echo '<?xml version="1.0" ?>';
    


if(isset($_REQUEST['Course'])){
    $courses=unserialize($_SESSION['Courses']);
    $course=$courses[$_REQUEST['Course']];
    $_SESSION['course']=serialize($course);

    $year= $course->getYears();
    echo "<years>";
    for($i=$year;$i>0;$i--){
        echo "<year>$i</year>";
    }
    echo $year;
    echo "</years>";


}else{
    if(isset($_REQUEST['year'])){
        $year=$_REQUEST['year'];
        $cours=unserialize($_SESSION['course']);
        $courss=  $cours->getSemestersForYear($year);
        echo "<semesters>";
        for($i=$courss;$i>0;$i--){
            echo "<semester>$i</semester>";
        }
        echo "</semesters>";

    }
}
}

?>
