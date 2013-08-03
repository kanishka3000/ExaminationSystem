<?php
session_start();
require_once("../class/Student.php");
require_once("../class/SemesterReport.php");
require_once("../class/Updf.php");
require_once("../class/Course.php");

if(isset($_REQUEST['final'])){
    $status=true;
    if(isset($_REQUEST['status'])){
        $status=false;
    }

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
    $sem=new SemesterReport();
    $sem->setData($students, $Ac_id, $year, $Semester);
    //print_r($sem);
    //echo "<br/> <br/>";
    //
    //
    //    echo "Lets Save it";
    //    print_r($students);
    $pdf= new Updf();
    $Students=$sem->Students;
    if(isset($_REQUEST['general'])){
        #genaral report
        $pdf->AddPage("L");
        $pdf->AddPage("L");
        $pdf->setFoodter(false);
        if(is_array($Students)){
        foreach($Students as $student){
            $head=array("student","name");
            $body=null;
            $body[]=$student->RegistrationId;
            $body[]=$student->Name;
            $stmarks=$student->ExaStudents;
            if(is_array($stmarks)){
                foreach($stmarks as $mks){
                    $head[]=$mks->SubName;
                    $body[]=$mks->Mark;
                }
            }
            $bod=null;
            $bod[]=$body;
            $pdf->NormalTable($head, $bod);
            $head=false;
            $bod=false;

        }
        }


    }else{



        $Ac_id=$_POST['fcourse'];
        //echo $Ac_id;

        #
        if(!$status){
            $pdf->AddPage("L");
            $pdf->setFoodter(false);
        }else{
            $pdf->AddPage();
            $pdf->setFoodter(true);
        }
        //print_r($courses);

        //print_r($extr);
        $Students=$sem->Students;
        //print_r($students);
        foreach($Students as $student){
            $A=0;$B=0;$C=0;$D=0;$E=0;
            if(!$status){
                $pdf->AddPage("L");
            }else{
                $pdf->AddPage();
            }
            //$pdf->SetLeftMargin(30);
            $pdf->SetLeftMargin(30);
            $pdf->SetFont('Arial','',16);
            $pdf->Cell(200,5,date("d/m/Y"));
            if($status){
                $pdf->Ln();
                $pdf->Ln();
                $pdf->SetFont('Arial','BU',18);
                // $pdf->Cell(200,10,"Diploma In Labour Education Examination");
              //  $pdf->Ln();
                //$pdf->Ln();
                $pdf->Ln();
            }
            $pdf->SetFont('Arial','',12);
            if($status){
                //this part defers from degree to diploma;
                if($activecourse->Degree=='T'){
                    $pdf->MultiCell(160, 10, "This is to certify that Mr/Miss $student->Name  was successful at the $activecourse->CourseName -Part $year($Semester semester),conducted by the institute.",'L');
                }else{
                    $pdf->MultiCell(160, 10, "This is to certify that Mr/Miss $student->Name    was successful at the Diploma year Examination in $activecourse->CourseName ,conducted by the institute.");
                }
                // $pdf->MultiCell(200, 10, "This is to certify that Mr $student->Name was successful at the $activecourse->CourseName,conducted by the institute.");

                $pdf->Ln();
                $pdf->MultiCell(160, 10, "The detals of the subjects offered at the  Examainations held  and gradings obtainded are given below.");
                $pdf->Ln();
            }
            $pdf->Cell(180,10,"Index No:$student->RegistrationId RegId=$student->Indexid" );
            $pdf->Ln();
            $stmarks=$student->ExaStudents;
            if(is_array($stmarks)){





                $subarray;
                $i=1;
                foreach($stmarks as $mks){

                    switch($mks->Rank){
                        case "A":$A++;break;
                            case "B":$B++;break;
                                case "C":$C++;break;
                                    case "D":$D++;break;
                                        default: $E++;


                                        }



                                        $ms= array("$i","$mks->SubName","$mks->Rank");
                                        if(!$status){
                                            $ms[]=$mks->ExamId;
                                            $ms[]=$mks->shy;
                                            $ms[]=$mks->Paper;
                                            $ms[]=$mks->PaperEdit;
                                            $ms[]=$mks->Assignment;
                                            $ms[]=$mks->Attendance;

                                            $ms[]=$mks->Mark;
                                        }



                                        $i++;
                                        $subarray[]=$ms;
                                    }
                                    $farray;
                                    if(!$status){
                                        $farray=array("","subjects","Gradings","Examid","A_pt","Paper","Edit","Assig","atten","total");
                                    }else{
                                        $farray=array("","subjects","Gradings");
                                    }



                                    $pdf->BasicTable($farray, $subarray);
                                    $pdf->Ln();
                                    if($status){
                                        $pdf->MultiCell(200, 10,"This letter is issued at the request of ");
                                        $pdf->Ln();
                                        $pdf->Ln();
                                        $pdf->Ln();
                                        $pdf->Ln();
                                        $pdf->Ln();
                                    }else{
                                        $pdf->Cell(120, 10,"Total of the student:$student->Total"); $pdf->Ln();
                                        $pdf->Cell(120, 10,"Average of the student:$student->Average");
                                    }
                                    //        $pdf->Cell(200,10,"Ms. AS Jayaratne");
                                    //        $pdf->Ln();
                                    //        $pdf->Cell(200,10,"Asst.Registar/Examination");
                                    $subarray=false;

                                }
                                $pdf->setGrades($A, $B, $C, $D, $E);

                            }
                        }
                        $pdf->Output();


                        //  print_r($sem);
                    }

                    ?>
