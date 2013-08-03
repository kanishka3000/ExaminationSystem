<?php
require_once("../class/Course.php");
require_once("../class/Updf.php");
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    $course=new Course();
    $courses;
    switch($type){
        case Active:{$courses=$course->getAllActiveCourses();}break;
            case Inactive:{$courses=$course->getAllInaciveActiveCourses();}break;
                case AllExisting:{$courses=$course->getTotalActiveCourses();}break;
                }
                //print_r($courses);
                $pdf= new Updf();
                $pdf->AddPage("L");
                $pdf->AddPage("L");
                $pdf->setFoodter(false);
                if(is_array($courses)){
                    $head=array("ActiveCourseId","CourseName","Course","Years","Deg_/Diploma","Start Date");
                    $body=null;
                    foreach($courses as $course1){
                        $body[]=array("$course1->Ac_id","$course1->CourseName","$course1->C_id","$course1->Years","$course1->Degree","$course1->StartDate");
                    }
                    $pdf->NormalTable($head, $body);
                }
                $pdf->Output();
            }
            ?>
