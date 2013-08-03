<?php
session_start();
require_once("../class/Examination.php");
$exams=unserialize($_SESSION['exas']);
if(isset($_REQUEST['Examid'])){
    $exid=$_REQUEST['Examid'];
    $exam=$exams[$exid];
    $exam->resetExamination();
   
    //print_r($exam);
    
       
}
 header("location:../Admin.php");
?>
