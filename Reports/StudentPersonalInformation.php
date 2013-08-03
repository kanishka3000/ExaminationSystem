<?php
require("../class/ExaminationOfficerReport.php");
require("../class/Student.php");
if(isset($_GET['Reg_id'])){
    $RegistrationNo= $_GET['Reg_id'];
    $rep=new ExaminationOfficerReport();
    $student= $rep->getStudentsPersonalInformation($RegistrationNo);
    $st=new Student();

}

?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Report :personal information student</title>
        <link href="../Style/Report.css" type="text/css" rel="stylesheet"/>
<script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>
<script language="javascript" type="text/javascript" src="javascript/OfficerUpdateStudentInfopage.js"></script>
    </head>
    <body>
        <div id="top">

        </div>
        <div id="body">
            <table>

            <?php
            if($student){
            echo "<img src=\"$student->Photo\" alt=\"student\" width=\"200\" height=\"200\"/>";
           
            echo "<tr><td>Name of Student:</td><td>$student->Name</td>";

            echo "<tr><td>Address of Student:</td><td><span id=\"address34\" onclick=\"makeText()\">$student->Address</span></td>";
            echo "<tr><td>National Id of Student:</td><td>$student->nationalid</td>";

            echo "<tr><td>Year of Attendance:</td><td><span>$student->Address2</span></td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->year</td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->Telephone</td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->Nationality</td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->Mobile</td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->School</td>";
            echo "<tr><td>Year of Attendance:</td><td>$student->University</td>";


            }else{
              echo "No such student, on system";
            }

            ?>

            </table>

        </div>


    </body>
</html>
