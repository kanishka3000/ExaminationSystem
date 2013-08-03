<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
//if(!isset($_SESSION['LOG'])){
//    header("location:index.php");
//}
include_once("class/Exam.php");
require_once("class/Examination.php");
$exms=new Examination();
$exams=$exms->getAllActiveExaminations();
$name=$_SESSION['Exnm'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Exofficer-Home</title>
        <script language="javascript" type="text/javascript" src="javascript/EExaminationOfficerAddNewExam.js"></script>
        <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>
        <script language="javascript" type="text/javascript" src="javascript/AdminAddUser.js"></script>
        <script language="javascript" src="javascript/validate.js" type="text/javascript"></script>

        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />
        <script type="text/javascript">
            <!--
            function MM_preloadImages() { //v3.0
                var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
                }
                //-->
        </script>

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
            #apDiv3 {
                position:absolute;
                width:123px;
                height:52px;
                z-index:3;
                top: 174px;
                left: 64px;

                text-shadow:#0066FF;
            }
            .style1 {
                font-size: 10pt;
                color: #000099;
            }
            -->
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="top">
            </div>
            <div id="content">

                <div id="menu">



                    <br />
                    <br/><br /><be>
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
                    <br /><br /><br /><br /><br /><br />
                    <table width="588" border="1" bgcolor="#B3ECFF">
                        <tr style=" font-weight:bold">

                            <td width="47" height="38">Examid</td>
                            <td width="90">ExamName</td>
                            <td width="64">Location</td>
                            <td width="37">year</td>
                            <td width="70">start date</td>
                            <td width="51">end date</td>
                            <td width="58">Inchrge</td>
                            <td width="60">Semester</td>
                            <td width="53">Course</td>

                        </tr>
                        <?php
                        if(is_array($exams)){
                            foreach($exams as $exam){
                                echo "<tr>";
                                echo "<td>$exam->Exa_id</td><td>$exam->ExaminationName</td><td>$exam->Location</td><td>$exam->year</td><td>$exam->StartDate</td><td>$exam->EndDate</td><td>$exam->TeacherInCharge</td><td>$exam->Semester</td><td>$exam->C_id</td>";

                                echo "</tr>";

                            }
                        }
                        ?>
                    </table>

                </div>
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </div>
        </div>
        <div id="bottom">
        </div>

    </body>
</html>


