<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Course.php");
require_once("class/Student.php");
require_once("class/Subject.php");
require_once("class/ExaSubject.php");
$students=unserialize($_SESSION['students']);
$subjects=unserialize($_SESSION['subjects']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Exofficer-Register students for exam</title>
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style/style2.css" />

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
        .style3 {font-size: 14pt;
            font-weight: bold;
            color: #0066FF;
        }
        #apDiv4 {
            position:absolute;
            left:596px;
            top:316px;
            width:359px;
            height:126px;
            z-index:1;
        }
        -->
    </style>
    <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>
<body >

<div ></div>
<div id="wrapper">
    <div id="top">
    </div>
    <div id="content">
        <div id="menu">



            <br />
            <br/>
            <div class="style1" id="apDiv3">
                <p align="justify"><strong> Welcome</strong>: Examination officer :<b><?php echo $name?></b></p>

            </div>

            <br/>
            <br />
            <ul>
                <li class="active"><a href="ExaminationOfficer.php" title="">Home</a></li>
                <li class="active"><a href="EExaminationOfficerAddNewExam.php">Add New Exam</a></li>
                <li><a href="EExaminationOfficerRegisterForExamA.php" title="">Register For Exam</a></li>
                <li><a href="EExaminationOfficerAddMarks.php" title="">Add Marks</a></li>
                <li><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a><a href="ExaminationOfficerReports.php" title="">Reports</a><a href="ExaminationOfficerUpdateMarks.php" title="">Update Marks</a><a href="ChangePassword.php"
                                                                                                                                                                                                                           title="">Password&amp;Settings</a><a href="Script/Logout.php"
                                                     title="">Logout</a></li>
                <li class="active"></li>


                <li>&nbsp;</li>
                <li><a href="Help/index.php">Help</a></li>
            </ul>
        </div>
        <div id="stuff">
        <br />
        <span class="style3">Register for exam</span></p>
        <p><br />
            <br />
            <br />
            <br />
            <br />
        </p>
        <form action="Script/EExaminationOfficerRegisterForExamB.php">
            <div><span id="spryselect1">
              <select size="25" name="student">
                <?php
                    $stno=count($students);
                    // echo "<select size=\"25\" name=\"student\">";
                    if(is_array($students)){
                        foreach($students as $stu){
                            echo "<option title=\"$stu->Name\">$stu->RegistrationNo</option>";
                        }
                        //echo "</select><br/>";
                    }
                    //         print_r($students);
                    //         print_r($subjects);
                    ?>
              </select>
            </span></div>
<div id="apDiv4">
                <table border="1">
                    <?php


                    if(is_array($subjects)){
                        foreach($subjects as $subje){
                            echo "<tr>";
                            // echo "<td>";
                            echo "<td><input type=\"checkbox\" name=\"$subje->Sub_id\" />$subje->Sub_id</td><td>$subje->SubjectName</td>";
                            //echo "</td>";
                            echo "<td>$subje->year</td><td>$subje->semester</td>";
                            echo "</tr>";
                        }

                    }

                    ?>
                </table>
                <br/>
                <input type="submit" value="Next" />
            </div>
            <div>
            </div>

        </form>
        <br /><br /><br /><br /><br /><br /><br /><br />
    </div>
</div>

<div id="bottom">
</div>

<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {isRequired:false});
//-->
</script>
</body>
</html>