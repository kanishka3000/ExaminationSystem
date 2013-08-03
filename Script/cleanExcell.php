<?php
session_start();
$xfile=$_SESSION['xlfile'];
if(file_exists($xfile)){
    unlink($xfile);
}

header("location:../ExaminationOfficer.php");
?>
