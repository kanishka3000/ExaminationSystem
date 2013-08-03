<?php
session_start();
require_once("../class/Course.php");
if(isset($_REQUEST['coures'])){
    $corses=unserialize($_SESSION['courses']);
    $activecourse=$corses[$_REQUEST['coures']];
    $activecourse->closeActiveCourse();
    $_SESSION['courses']=serialize($activecourse);
    header("location:../Confirmation/AdminCloseActiveCourse.php");

}
?>
