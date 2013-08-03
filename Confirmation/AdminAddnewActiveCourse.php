<?php
session_start();
require_once("../class/Course.php");
$activecourse=unserialize($_SESSION['activecourse']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       print_r($activecourse);
        ?>
        Add anohter active course
        <a href="../AdminAddnewActiveCourse.php">OK</a><br>
Exit Course Adding process
<a href="../Admin.php">OK</a><br/>

</body>
</html>
