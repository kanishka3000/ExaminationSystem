<?php
session_start();

require_once("../class/Course.php");
require_once("../class/Examination.php");
require_once("../class/UNpdf.php");

$courses=unserialize($_SESSION['korse']);
//print_r($courses);
if(isset($_REQUEST['rep'])){
    $re=$_REQUEST['rep'];
    $examination=new Examination();
    $exams;
    if(isset($_REQUEST['che'])){
        $cid=$_REQUEST['course'];
       // echo $cid;
       
       $course=$courses[$cid];
 //print_r($course);
        if($re=="ae"){
            $exams=$examination->getExaminationToCourse($course,1);

        }elseif($re=="ue"){
            $exams=$examination->getExaminationToCourse($course,2);

        }elseif($re=="alle"){
            $exams=$examination->getExaminationToCourse($course,0);
           // print_r($exams);
        }



    }else{
        if($re=="ae"){
            $exams=$examination->getAllActiveExaminations();

        }elseif($re=="ue"){
            $exams=$examination->getAllUpdateableExaminations();

        }elseif($re=="alle"){
            $exams=$examination->getAllExaminations();

        }
    }
    if(is_array($exams)){
        foreach($exams as $exam){
            $exam->setExams();
        }
    }
    $pdf= new UNpdf();
    #
    $pdf->AddPage("L");
    $pdf->SetFont('Times','',11);
    $pdf->SetLeftMargin(30);

    if(is_array($exams)){
        $pdf->AddPage("L");
$head0=array("ExamId","ExamName","course","StartDate","End Date","Teacher","Location");
        foreach($exams as $exam){
            $body0=null;
            $body0=array(array($exam->Exa_id,$exam->ExaminationName,$exam->C_id,$exam->StartDate,$exam->EndDate,$exam->TeacherInCharge,$exam->Location));
            $pdf->Ln();
            $pdf->NormalTable($head0, $body0);
           // $pdf->MultiCell(160, 8, "Examination :$exam->Exa_id named as :$exam->ExaminationName of course:$exam->C_id starts on $exam->StartDate and ends on $exam->EndDate at $exam->Location lecturer for the examination is named as $exam->TeacherInCharge");

            $subexams=$exam->Exams;
            if(is_array($subexams)){
                $head1=array("SubIden","Subject","Ass_Per","Att_Per","A:","B:","C:","D");
                 $body1=null;
                foreach($subexams as $subexam){
                   
                    $body1[]=array($subexam->Examid,$subexam->Sub_id,$subexam->AssignementPercs,$subexam->AttendancePercs,$subexam->Afrom,$subexam->Bfrom,$subexam->Cfrom,$subexam->Dfrom);
                   // $pdf->MultiCell(160, 4, "Exam :$subexam->Examid subject-->$subexam->Sub_id | percentage for assignments is $subexam->AssignementPercs% and percentage for attendance is $subexam->AttendancePercs %");
                    // $pdf->Ln();
                   // $pdf->MultiCell(180, 4, "A :$subexam->Afrom B:$subexam->Bfrom C:$subexam->Cfrom D:$subexam->Dfrom");
                    // $pdf->Ln();
                }
                $pdf->NormalTable($head1, $body1);
            }

        }
    }


   $pdf->Output();


}

?>
