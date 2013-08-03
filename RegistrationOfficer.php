<?php
session_start();
if($_SESSION['LOG']!='R'){
    header("location:index.php");
}
require_once("class/Student.php");
require_once("class/Course.php");
$couse=new Course();
$activeCoruses=$couse->getAllActiveCourses();
$_SESSION['activecourse']=serialize($activeCoruses);
$name=$_SESSION['regn'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>RegOfficer-Home</title>
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style/style2.css" />
    <script language="javascript" src="javascript/RegistrationofficerRegisterCourse.js"></script>
    <script language="javascript" src="javascript/Ajax.js"></script>
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
        .style2 {	color: #3366CC;
            font-size: 18px;
            font-weight: bold;
        }
        -->
    </style>
</head>
<body >

<div id="wrapper">
    <div id="top">
    </div>
    <div id="content">

        <div id="menu">
            <br />
            <br/>
            <div class="style1" id="apDiv3">
                <b> Welcome:&nbsp;</b>Registration officer:&nbsp;<?php echo "<strong> $name </strong> "?> </p>
            </div>

            <br/>
            <br />
            <ul>
                <li ><a href="RegistrationOfficer.php" title="">Home</a></li>
                <li><a href="RegistrationOfficerRegisterStudent.php">Register Student</a></li>
                <li><a href="RegistrationOfferRegisterCourse.php" title="">Register Student for course</a></li>
                <li><a href="OfficerUpdateStudentInformation.php" title="">Update Student Information</a></li>
                <li><a href="ChangePassword.php">Change password</a></li>
                <li><a href="Script/Logout.php" title="">Logout</a></li>
                <li ></li>
            </ul>
        </div>
        <div id="stuff">
            <br /><br /><br /><br />
            <p>The active Courses in the database-><br/>
            </p>
            <table border="1">

                <head>
                    <tr>
                        <td>Active Couse</td>
                        <td>Course</td>
                        <td>Course Name</td>
                        <td>Start Date</td>
                    </tr>
                </head>
                <?php
                //  print_r($activeCoruses);
                if(is_array($activeCoruses)){
                    foreach($activeCoruses as $activecourse){
                        echo "<tr>";
                        echo "<td>$activecourse->Ac_id</td>";
                        echo "<td>$activecourse->C_id</td>";
                        echo "<td>$activecourse->CourseName</td>";
                        echo "<td>$activecourse->StartDate</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
            <br /><br /><br /><br /><br /><br /><br /><br /><br />



        </div>
    </div>



    <div id="bottom">
    </div>
</div>
</body>
</html>



