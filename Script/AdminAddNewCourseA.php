<?php
session_start();
require_once("../class/AddCourse.php");
if(isset($_REQUEST['C_id'])){
    $C_id=$_REQUEST['C_id'];
    $CourseName=$_REQUEST['CourseName'];
    $LecturerInCharge=$_REQUEST['Lecturerinchrge'];
    $Years=$_REQUEST['years'];
    $Degree;
    if(isset($_REQUEST['Degree'])){
        $Degree='T';
    }else{
        $Degree='F';
    }
    $cour=new AddCourse();
    $cour->C_id=$C_id;
    $cour->CourseName=$CourseName;
    $cour->LecturerInCharge=$LecturerInCharge;
    $cour->Degree=$Degree;
    $cour->Years=(int)$Years;
    $cour->setYears();
    $tempNoSubs;
    for($i=0;$i<$cour->Years;$i++){

    $te="yr".($i+1);
    $sub=$_REQUEST[$te];
    //echo $sub;
    $tempNoSubs[$i]=$sub;
    }
    //print_r($tempNoSubs);
    $cour->setSubjects($tempNoSubs);
    $_SESSION['Course']=serialize($cour);

    header("location:../AdminAddNewCourseB.php");
   // print_r($cour);

}
?>
