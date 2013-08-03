<?php
session_start();
require_once("../class/Course.php");
$activecourse=serialize($_SESSION['courses']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    The following course was closed. This process is not reversible
        <?php
        print_r($activecourse);
        ?>
        Would you like to close another couse<a href="../AdminCloseActiveCourse.php">Yes</a>&nbsp;<a href="">No</a>



    </body>
</html>
