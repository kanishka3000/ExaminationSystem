<?php
session_start();
require_once("../class/Updf.php");
require_once("../class/Student.php");
require_once("../class/Course.php");
$allcourses=unserialize($_SESSION['cos']);

if(isset($_REQUEST['course'])){
    $course=$_REQUEST['course'];
$activecourse=$allcourses[$course];
$st=new Student();
$students=$st->getAllActiveStudents($activecourse);



$pdf= new Updf();
 $pdf->AddPage("L");
        $pdf->AddPage("L");
        $head=array("Name","Address1","RegistrationId","Address2","Mobile","Occupation","School","Telephone");
        $body=null;
        if(is_array($students)){
            foreach($students as $student){
                  $body[]=array($student->Name,$student->Address,$student->RegistrationNo,$student->Address2,$student->Mobile,$student->job,$student->School,$student->Telephone);
                
            }
          
            
            
        }else{
            $body=array();
        }
        $pdf->NormalTable($head, $body);
        $pdf->Output();
        
//print_r($students);


}

?>
