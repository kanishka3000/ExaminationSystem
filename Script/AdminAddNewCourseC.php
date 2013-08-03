<?php
session_start();
require_once("../class/AddCourse.php");
$cour=unserialize($_SESSION['Course']);
$cour->saveAll();
header("location:../AdminAddNewCourseA.php");
//print_r($cour);
?>