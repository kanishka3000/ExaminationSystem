<?php
session_start();
require_once("../class/Student.php");
require_once("../class/SemesterReport.php");
require_once("../class/Updf.php");
require_once("../class/Course.php");
require_once("../class/YearlyReport.php");
require_once("../class/ExaminationOfficerTranscript.php");
require_once("../class/ExaminationOfficerTranscriptSemester.php");


if(isset($_REQUEST['final'])){
    $status=true;
    if(isset($_REQUEST['status'])){
        $status=false;
    }
    //$year=$_SESSION['Year'];
    //$Semester=$_SESSION['Semester'];
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
    $sem=new ExaminationOfficerTranscriptSemester();
    //    if($status){
    $sem->TotalData=true;
    //    }
    $sem->setData($students, $Ac_id,1,1);
    // print_r($sem);
    //echo "<br/> <br/>";
    //
    //
    //    echo "Lets Save it";
    //    print_r($students);


    $Ac_id=$_POST['fcourse'];
    //echo $Ac_id;
    $pdf= new Updf();
    #
    if(!$status){
        $pdf->AddPage("L");
    }else{
        $pdf->AddPage();
    }
    //print_r($courses);

    //print_r($extr);
    $Students=$sem->Students;
    //print_r($students);
    foreach($Students as $student){
        if(!$status){
            $pdf->AddPage("L");
            $pdf->setFoodter(false);
        }else{
            $pdf->AddPage();
            $pdf->setFoodter(true);
        }
        //$pdf->SetLeftMargin(30);
        $pdf->SetLeftMargin(30);
        $pdf->SetFont('Arial','',16);
        $pdf->Cell(200,5,date("d/m/Y"));
        if($status){
            //$pdf->Ln();
            $pdf->Ln();
        }
        $pdf->SetFont('Arial','BU',18);
        // $pdf->Cell(200,10,"Diploma In Labour Education Examination");
        if($status){
            //$pdf->Ln();
            //$pdf->Ln();
            $pdf->Ln();}
        $pdf->SetFont('Times','',12);
        //this part defers from degree to diploma;
        //        if($activecourse->Degree=='T'){
        //            $pdf->MultiCell(180, 10, "This is to certify that Mr/Miss $student->Name  was successful at the $activecourse->CourseName -Part $year($Semester semester),conducted by the institute.",'L');
        //        }else{
        //            $pdf->MultiCell(180, 10, "This is to certify that Mr/Miss $student->Name    was successful at the Diploma year Examination in $activecourse->CourseName ,conducted by the institute.");
        //        }
        // $pdf->MultiCell(200, 10, "This is to certify that Mr $student->Name was successful at the $activecourse->CourseName,conducted by the institute.");

        $pdf->Ln();
        $pdf->MultiCell(160, 6, "The detals of the subjects offered at the  Examainations held  and gradings obtainded are given below.");
        $pdf->Ln();
        $pdf->Cell(180,6,"Index No:$student->RegistrationId Reg:$student->Indexid");
        $pdf->Ln();
        #code to divide in to separate semester which are in the array;
        $AllMarks=$student->ExaStudents;
        //print_r($AllMarks);
        // $stmarks;
        if(is_array($AllMarks)){
            $i=1;
             $A=0;$B=0;$C=0;$D=0;$E=0;
            foreach($AllMarks as $key=>$AllMark){
                
                
                $se=$AllMark->Semester;
               
                $stmarks=$AllMark;
                //$stmarks=$se;
                $pdf->MultiCell(180, 5, "These are the values of the Year $key.");
                if(is_array($stmarks)){
                //    print_r($stmarks);
                  
                    foreach($stmarks as $key1=> $mks){
                        /////Edita
                        $pdf->MultiCell(180, 5, "These are the values of the Semester $key1.");
                        if(is_array($mks)){
                            /*  
                             * how to get the grading to each page;
                             *
                             */
                           $subarray=null;
                            foreach($mks as $mkl){
                                switch($mkl->Rank){
                                    case "A":$A++;break;
                                        case "B":$B++;break;
                                            case "C":$C++;break;
                                                case "D":$D++;break;
                                                    default: $E++;


                                                    }
                                                    $ms= array("$i","$mkl->SubName","$mkl->Rank");
                                                    if(!$status){
                                                        $ms[]=$mkl->ExamId;
                                                        $ms[]=$mkl->Paper;
                                                        $ms[]=$mkl->Assignment;
                                                        $ms[]=$mkl->Attendance;
                                                        $ms[]=$mkl->Mark;
                                                    }
                                                    $i++;
                                                    $subarray[]=$ms;
                                                }
                                             
                                            }
                                            
                                            
                                             $farray;
                                        if(!$status){
                                            $farray=array("","subjects","Gradings","Examid","Paper","Assig","atten","total");
                                        }else{
                                            $farray=array("","subjects","Gradings");
                                        }
                                        $pdf->BasicTable($farray, $subarray);
                                        $pdf->Ln();
                                            
                                            
                                            
                                            
                                        }
                                       

                                        $subarray=false;
                                    }
                                }
                              //  $pdf->MultiCell(200, 10,"This letter is issued at the request of ");
                                 $pdf->setGrades($A, $B, $C, $D, $E);
                                $pdf->Ln();
                                $pdf->Ln();
                                $pdf->Ln();
                                $pdf->Ln();
                                $pdf->Ln();


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


                        //  print_r($sem);
                    }

                    ?>






