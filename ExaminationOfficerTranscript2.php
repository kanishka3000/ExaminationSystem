<?php
session_start();
require_once("class/Course.php");
require_once("class/Student.php");
$Students=unserialize($_SESSION['Students']);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Exofficer-Transcript</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <script language="javascript" type="text/javascript" src="javascript/EExaminationOfficerAddNewExam.js"></script>
        <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>

        <style type="text/css">
            <!--
            #apDiv1 {
                position:absolute;
                left:559px;
                top:235px;
                width:103px;
                height:87px;
                z-index:1;
            }
            #apDiv2 {
                position:absolute;
                left:730px;
                top:226px;
                width:113px;
                height:92px;
                z-index:2;
            }
            -->
        </style>
    </head>
    <body >

        <div id="wrapper">
            <div id="top">
            </div>
            <div id="content">
                <div id="header">
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                </div>

                <div id="menu">
                    <ul>
                        <li ><a href="#" title="">Home</a></li>
                        <li><a href="#">Add New Exam</a></li>
                        <li><a href="ExaminationOfficerRegisterStudent.php" title="">Register For Exam</a></li>
                        <li><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a></li>
                        <li><a href="ExaminationOfficerReports.php" title="">Reports</a></li>
                        <li><a href="ExaminationOfficerResetAttempt.php" title="">Reset Attempt</a></li>
                        <li><a href="ChangePassword.php" title="">PassWord&Settings</a></li>
                        <li><a href="Script/Logout.php" title="">Logout</a></li>

                    </ul>
                </div>
                <form action="Script/ExaminationOfficerTranscript2.php">
                    <div id="stuff">
                  <input type="hidden" name="final" value="final"/>
                  <b>  Please Select the Students Requesting for semesterwise Report</b><br/>
                    Repeating the process will genarate multiple reports with redundant data.
                    <table border="1">
                    <tr>
                    <td>Registration No</td>
                    <td>Index</td>
                    <td>Name</td>
                    <td>Accept</td>
                    </tr>
<?php
if(is_array($Students)){
    foreach($Students as $student){
        echo "<tr>";
        echo "<td>$student->RegistrationNo</td><td>$student->IndexNo</td><td>$student->Name </td><td><input type=\"checkbox\" name=\"$student->RegistrationNo\"></td>";
        echo "</tr>";
    }
}
else{
    echo "There are no data availabe to display<br/> <b>Please make sure you selected functioning course";
}

?>

</table>
<br/>Include Total History:
<input type="checkbox" name="status"/><br/>
<input type="submit" value="Genarate>"/>
<br/>
<br/>
<a href="SemWiseReport.php"><img src="images/ok.gif"></a>
</div>
                </form>
            </div>
            <div id="bottom">
            </div>
        </div>
    </body>
</html>
