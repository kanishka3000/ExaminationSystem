<?php
session_start();
require_once("../class/Examination.php");
require_once("../class/Subject.php");
require_once("../class/Exam.php");
$exa=unserialize($_SESSION['Examination']);
$subject=$exa->Subjects;


if(is_array($subject)){
    $Exams;
    foreach($subject as $subj){
        $subid=$subj->Sub_id;
        $cheksub="ch-$subid";

        if(isset($_REQUEST[$cheksub])){
            $exid="Exid-$subid";
            $assi="Assi-$subid";
            $atte="Atte-$subid";
            $afrom="A-$subid";
            $bfrom="B-$subid";
            $cfrom="C-$subid";
            $dfrom="D-$subid";
            $exa1=new Exam();
            $exa1->Examid=$_REQUEST[$exid];
            $exa1->AssignementPercs=$_REQUEST[$assi];
            $exa1->AttendancePercs=$_REQUEST[$atte];
            $exa1->Afrom=$_REQUEST[$afrom];
            $exa1->Bfrom=$_REQUEST[$bfrom];
            $exa1->Cfrom=$_REQUEST[$cfrom];
            $exa1->Dfrom=$_REQUEST[$dfrom];
            $exa1->Sub_id=$subj->Sub_id;
            $exams[]=$exa1;
        }
    }

    $exa->Exams=$exams;

    $res=$exa->saveExamination();
    $_SESSION['Examination']=serialize($exa);

}
header("location:../Confirmation/EExaminationOfficerAddNewExam.php");




?>
