<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once("../class/Updf.php");
require_once("../class/Course.php");
require_once("../class/ExaminationOfficerReport.php");
require_once("../class/ExaminationOfficerTranscript.php");
$Ac_id=$_POST['fcourse'];
//echo $Ac_id;
$pdf= new Updf();
#
$courses=unserialize($_SESSION['corsee']);
$course=$courses[$Ac_id];
//print_r($courses);
$extr=new ExaminationOfficerTranscript();
$extr->setTranscript($course);
//print_r($extr);
$students=$extr->Students;
//print_r($students);
foreach($students as $student){
    $pdf->AddPage();

    $pdf->SetFont('Arial','',16);
    $pdf->Cell(200,5,date("d/m/Y"));
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','BU',18);
    $pdf->Cell(200,10,"Diploma In Labour Education Examination");
    $pdf->Ln();
    $pdf->SetFont('Arial','',12);
    $pdf->MultiCell(200, 10, "This is to certify that Mr $student->Name was successful at the $course->CourseName,conducted by the institute.");
    $pdf->Ln();
    $pdf->MultiCell(200, 10, "The detals of the subjects offered at the Diploma Examainations held in 2008 and 2009 and gradings obtainded are given below.");
    $pdf->Ln();
    $pdf->Cell(200,10,"Index No:DY1392");
    $pdf->Ln();
    $stmarks=$student->Marks;
    if(is_array($stmarks)){

        $subarray;
        $i=1;
        foreach($stmarks as $mks){
            $ms= array("$i","$mks->SubName","$mks->Rank","$mks->Mark");
            $i++;
            $subarray[]=$ms;
        }




        $pdf->BasicTable(array("","subjects","Gradings"), $subarray);
        $pdf->Ln();
        $pdf->MultiCell(200, 10,"This letter is issued at the request of Mr.XXX YYY");
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(200,10,"Dr. WK Hirimburegama");
        $pdf->Ln();
        $pdf->Cell(200,10,"Director/IHRA");
        $subarray=false;

    }


}
$pdf->Output();
//$exa=new ExaminationOfficerReport();
//$Rep=$exa->getStudentExamInformation($Ac_id);
//print_r($Rep);
//$pdf->AddPage();
//foreach($Rep as $report){
//    $pdf->AddPage();
//
//
//$pdf->SetFont('Arial','',16);
//$pdf->MultiCell(200,5,"The Student Registration id =");
//}
#dummy report;

//for($i=0;$i<10;$i++){
//    $pdf->AddPage();
//    $pdf->SetFont('Arial','',16);
//    $pdf->Cell(200,5,date("d/m/Y"));
//    $pdf->Ln();
//    $pdf->Ln();
//    $pdf->SetFont('Arial','BU',18);
//    $pdf->Cell(200,10,"Diploma In Labour Education Examination");
//    $pdf->Ln();
//    $pdf->SetFont('Arial','',12);
//    $pdf->MultiCell(200, 10, "This is to certify that Mr.XXXx YYYy was successful at the Diploma Year Eamination in Labour Education,conducted by the institute.");
//    $pdf->Ln();
//    $pdf->MultiCell(200, 10, "The detals of the subjects offered at the Diploma Examainations held in 2008 and 2009 and gradings obtainded are given below.");
//    $pdf->Ln();
//    $pdf->Cell(200,10,"Index No:DY1392");
//    $pdf->Ln();
//    $pdf->BasicTable(array("","subjects","Gradings"), array(array("1","legal Environment","C"),array("2","Econmics","C"),array("3","English Language","A")));
//    $pdf->Ln();
//    $pdf->MultiCell(200, 10,"This letter is issued at the request of Mr.XXX YYY");
//    $pdf->Ln();
//    $pdf->Ln();
//    $pdf->Ln();
//    $pdf->Ln();
//    $pdf->Ln();
//    $pdf->Cell(200,10,"Dr. WK Hirimburegama");
//    $pdf->Ln();
//    $pdf->Cell(200,10,"Director/IHRA");
//
//
//
//
//}
//

//




?>
