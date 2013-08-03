<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once("../class/Student.php");
if(isset($_GET['RegistrationNo'])){
    header("Content-type:text/xml");
    $RegistrationNo=$_GET['RegistrationNo'];
    $stu=new Student();
    $student=$stu->studentExist($RegistrationNo);
    $_SESSION['student']=serialize($student);
    if($student!=false){
        //        $cos=new Course();
        //        $courses=$cos->getAllActiveCourses();
        echo '<?xml version="1.0" ?>';
        echo "<courses>";
        //foreach($courses as $co){
        echo "<nid>$student->RegistrationNo</nid>";
        echo "<name>$student->Name</name>";
        echo "<address>$student->Address</address>";
        echo "<saddress>$student->Address2</saddress>";
        echo "<telephone>$student->Telephone</telephone>";
        echo "<mobile>$student->Mobile</mobile>";
        echo "<university>$student->University</university>";
        echo "<image>$student->Photo</image>";
        // }
        echo "</courses>";
    }
}elseif(isset($_REQUEST['sav'])){
    $res=$_POST;
    $student=unserialize($_SESSION['student']);
    //print_r($res);
    if(is_array($res)){
    foreach($res as $re=>$val){
     if($re=="name"||$re=="address"||$re=="saddress"||$re=="telephone"||$re=="mobile"||$re=="university"){
       $student->editByProperty($re,$val);
       //echo $val;
     }

    }

    }
    header("location:../Confirmation/OfficerUpdateStudentInformation.php");
    //echo "saving";
}
?>
