<?php
session_start();
require_once("../class/Subject.php");
require_once("../class/ExaSubject.php");
require_once("../class/Student.php");
require_once("../class/Mark.php");
if(isset($_REQUEST['student'])){
    $student=$_REQUEST['student'];
    $subjects=unserialize($_SESSION['subjects']);
    $students=unserialize($_SESSION['students']);
    //print_r($_REQUEST);
    $subjectss;
    foreach($subjects as $subject){
        $subid=$subject->Sub_id;
        //echo $subid;
        if(isset($_REQUEST[$subid])){
            $subjectss[]=$subject;
        }
    }
    #$subjectss holds the values to the applied subjects only
    $mark=new Mark();
    $stud=$students[$student];
    $marks=$mark->registerForExam($stud, $subjectss);
    //print_r($marks);
    unset($students[$student]);
    $_SESSION['students']=serialize($students);
    $_SESSION['Marks']=serialize($marks);

    // print_r($students);
    header("location:../EExaminationOfficerRegisterForExamC.php");
}else{
     header("location:../EExaminationOfficerRegisterForExamB.php");
}
?>
