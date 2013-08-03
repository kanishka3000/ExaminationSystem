<?php
session_start();
include_once("class/Student.php");
$student=unserialize($_SESSION['studentR']);
?>


<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Officer:StudentInformation</title>
        <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>
<script language="javascript" type="text/javascript" src="javascript/OfficerUpdateStudentInfopage.js"></script>
    </head>
    <body>
    <table>
        <?php
          if($student){
            echo "<img src=\"$student->Photo\" alt=\"student\" width=\"200\" height=\"200\"/>";
            echo "<tr><td>Name of Student:</td><td>$student->Name</td>";

            echo "<tr><td>Address of Student:</td><td><span id=\"addressa\" onclick=\"makeText(event)\" onblur=\"makeFlat(event)\">$student->Address</span></td>";
            echo "<tr><td>National Id of Student:</td><td>$student->nationalid</td>";

            echo "<tr><td>Secondary Address of Student:</td><td><span id=\"addressb\" onclick=\"makeText(event)\">$student->Address2</span></td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->year</td>";
            echo "<tr><td>Home Telephone No</td><td><span id=\"telephonea\" onclick=\"makeText(event)\">$student->Telephone</span></td>";
            echo "<tr><td>Nationlailty</td><td>$student->Nationality</td>";
            echo "<tr><td>Mobile:</td><td><span id=\"mobilea\" onclick=\"makeText(event)\">$student->Mobile</span></td>";
            echo "<tr><td>School:</td><td>$student->School</td>";
            echo "<tr><td>University:</td><td>$student->University</td>";


            }else{
              echo "No such student, on system";
            }

        ?>
        </table>
    </body>
</html>
