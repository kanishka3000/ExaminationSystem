<?php
session_start();

require_once("../class/Student.php");
require_once("../class/Course.php");
if(isset($_REQUEST['acset'])){
    if(isset($_SESSION['student'])){
        $activeCoruses=unserialize($_SESSION['activecourse']);
        //        print_r($activeCoruses);
        //        echo $_REQUEST['accorse'];
        $activeCoruse=$activeCoruses[$_REQUEST['accorse']];
        //        print_r($activeCoruse);
        $indexid=$_REQUEST['indexno'];
        $student=unserialize($_SESSION['student']);
        $student->IndexNo=$indexid;
        $activeCoruse->registerForActiveCourse($student);
        $_SESSION['activecourse']=serialize($activeCoruse);
        header("location:../Confirmation/RegistrationOfferRegisterCourse.php");
    }else{
        $_SESSION['sterror']="stuent missing";
        header("location:../RegistrationOfferRegisterCourse.php");
    }
}
elseif(isset($_GET['RegistrationNo'])){
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
}
?>
