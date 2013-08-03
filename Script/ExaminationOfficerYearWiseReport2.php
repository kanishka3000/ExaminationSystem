<?php

session_start();
require_once("../class/Student.php");
require_once("../class/SemesterReport.php");
require_once("../class/Updf.php");
require_once("../class/Course.php");
require_once("../class/YearlyReport.php");

if(isset($_REQUEST['final'])){

    $year=$_SESSION['Year'];
    $Semester=$_SESSION['Semester'];
    $Ac_id=$_SESSION['ActiveCourse'];
    $activeCoruses=unserialize($_SESSION['Courses']);
    $activecourse=$activeCoruses[$Ac_id];
    $Students=unserialize($_SESSION['Students']);
    $students;
    foreach($Students as $Student){
        if(isset($_REQUEST[$Student->RegistrationNo])){

            $students["$Student->RegistrationNo"]=$Student;
        }

    }
    $sem=new YearlyReport();
    $sem->setData($students, $Ac_id, $year,1);
    //print_r($sem);
    //echo "<br/> <br/>";
    //
    //
    //    echo "Lets Save it";
    //    print_r($students);


    $Ac_id=$_POST['fcourse'];
    //echo $Ac_id;
    $pdf= new Updf();
    $pdf->setFoodter(true);
    #
    $pdf->AddPage();
    //print_r($courses);

    //print_r($extr);
    $Students=$sem->Students;
    //print_r($students);
    foreach($Students as $student){
          $A=0;$B=0;$C=0;$D=0;$E=0;
        $pdf->AddPage();
        //$pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(30);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(200,5,date("d/m/Y"));
       // $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial','BU',18);
        //    $pdf->Cell(200,10,"Diploma In Labour Education Examination");
        //$pdf->Ln();
       // $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        //this part defers from degree to diploma;
        if($activecourse->Degree=='T'){
            $pdf->MultiCell(180, 10, "This is to certify that Mr/Miss $student->Name  was successful at the $activecourse->CourseName -Part $year($Semester semester),conducted by the institute.",0,'L');
        }else{
            $pdf->MultiCell(180, 10, "This is to certify that Mr/Miss $student->Name    was successful at the Diploma year Examination in $activecourse->CourseName ,conducted by the institute.");
        }
        // $pdf->MultiCell(200, 10, "This is to certify that Mr $student->Name was successful at the $activecourse->CourseName,conducted by the institute.");

        $pdf->Ln();
        $pdf->MultiCell(180, 10, "The detals of the subjects offered at the  Examainations held  and gradings obtainded are given below.");
        $pdf->Ln();
        $pdf->Cell(180,10,"Index No:$student->RegistrationId");
        $pdf->Ln();
        #code to divide in to separate semester which are in the array;
        $AllMarks=$student->ExaStudents;
        // $stmarks;
        if(is_array($AllMarks)){
             $i=1;
            foreach($AllMarks as $key=>$AllMark){
                $se=$AllMark->Semester;
                $stmarks=$AllMark;
                $pdf->MultiCell(200, 10, "These are the values of the semeser $key.");
                if(is_array($stmarks)){

                    $subarray;
                   
                    foreach($stmarks as $mks){

                           switch($mks->Rank){
                        case "A":$A++;break;
                            case "B":$B++;break;
                                case "C":$C++;break;
                                    case "D":$D++;break;
                                        default: $E++;


                                        }


                        $ms= array("$i","$mks->SubName","$mks->Rank","$mks->Mark");
                        $i++;
                        $subarray[]=$ms;
                    }

                    $pdf->BasicTable(array("","subjects","Gradings"), $subarray);
                    $pdf->Ln();

                    $subarray=false;
    $pdf->setGrades($A, $B, $C, $D, $E);







                }
            }
            $pdf->MultiCell(200, 10,"This letter is issued at the request of ");
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            //                $pdf->Cell(200,10,"Ms. AS Jayaratne");
            //                $pdf->Ln();
            //                $pdf->Cell(200,10,"Asst.Registar/Examination");

        }




        //        if(is_array($stmarks)){
        //
        //            $subarray;
        //            $i=1;
        //            foreach($stmarks as $mks){
        //                $ms= array("$i","$mks->SubName","$mks->Rank","$mks->Mark");
        //                $i++;
        //                $subarray[]=$ms;
        //            }
        //
        //
        //
        //
        //            $pdf->BasicTable(array("","subjects","Gradings"), $subarray);
        //            $pdf->Ln();
        //            $pdf->MultiCell(200, 10,"This letter is issued at the request of ");
        //            $pdf->Ln();
        //            $pdf->Ln();
        //            $pdf->Ln();
        //            $pdf->Ln();
        //            $pdf->Ln();
        //            $pdf->Cell(200,10,"Ms. AS Jayaratne");
        //            $pdf->Ln();
        //            $pdf->Cell(200,10,"Asst.Registar/Examination");
        //            $subarray=false;
        //
        //        }


    }
    $pdf->Output();


    print_r($sem);
}

?>



