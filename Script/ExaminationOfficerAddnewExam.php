<?php

session_start();
require_once("../class/Course.php");

if(isset($_GET['Course'])){
    header("Content-type:text/xml");
    $cid=$_GET['Course'];
    $Courses=unserialize($_SESSION['Course']);
    $Course=$Courses[$cid];
   
    $Course->setSubjects();
    $subs=$Course->Subjects;
    echo '<?xml version="1.0" ?>';
    echo "<subjects>";
    foreach($subs as $sub){
        echo "<subject>$sub->Sub_id</subject>";
    }
    echo "</subjects>";
    $_SESSION['Course']=serialize($Course);
}
if(isset($_POST['subject'])){
$subj=$_POST['subject'];
 //echo $subj;
 $Cours=unserialize($_SESSION['Course']);
$subjects=$Cours->Subjects;

$subject=$subjects["$subj"];
//print_r($subjects);
//echo "ok</br>";
//print_r($subject);
$re=$subject->newExam($_POST['Examid'],$_POST['ExamName'],$_POST['AssignmentPerc'],$_POST['Afrom'],$_POST['Bfrom'],$_POST['Cfrom'],$_POST['Dfrom']);
if($re){
    unset($_SESSION['Exam']);
    header("location:../ExaminationOfficer.php");
}
}



?>
