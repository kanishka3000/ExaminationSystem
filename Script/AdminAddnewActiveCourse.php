<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once("../class/Course.php");
if(isset($_REQUEST['course'])){
    $C_id=$_REQUEST['course'];
    $Ac_id=$_REQUEST['acid'];
    $Batch=$_REQUEST['batch'];
    $Sdate=$_REQUEST['sdate'];
    $activecourse=new Course();
    $activecourse->Ac_id=$Ac_id;
    $activecourse->C_id=$C_id;
    $activecourse->Batch=$Batch;
    $activecourse->StartDate=$Sdate;
    $activecourse->addNewActiveCourse();
    $_SESSION['activecourse']=serialize($activecourse);

    header("location:../Confirmation/AdminAddnewActiveCourse.php");
}
?>
