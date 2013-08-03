<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Course.php");
$co=new Course();
$courses=$co->getAllCourses();
$_SESSION['korse']=serialize($courses);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Exofficer-Exam Reports</title>
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
                    <form action="Script/ExaminationOfficerExamReport.php">
                        Please select the report type to genarate<br/>
                        <table>
                            <tr>
                                <td> Active Examinations</td>
                                <td> <input type="radio" name="rep" value="ae"/></td>
                            </tr>
                            <tr>
                                <td>Updateable Examinations </td>
                                <td><input type="radio" name="rep" value="ue"/></td>
                            </tr>
                            <tr>
                                <td>All Examinations</td>
                                <td><input type="radio" name="rep" value="alle"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Genarate->"></td>
                            </tr>
                        </table>

                    </form>
                    <br/>
                    <br/>

                    <form action="Script/ExaminationOfficerExamReport.php">
                    <input type="hidden" name="che" value="che">
                        <table>
                            <tr>
                                <td> Select a course</td>
                                <td> <?php
                                    if(is_array($courses)){
                                        echo "<select name=\"course\">"    ;
                                        foreach($courses as $course){
                                            echo "<option>$course->C_id</option>";
                                        }
                                        echo "</select>";
                                    }
                                    ?></td>
                            </tr>

                            <tr>
                                <td> Active Examinations</td>
                                <td> <input type="radio" name="rep" value="ae"/></td>
                            </tr>




                            <tr>
                                <td>Updateable Examinations </td>
                                <td><input type="radio" name="rep" value="ue"/></td>
                            </tr>
                            <tr>
                                <td>All Examinations</td>
                                <td><input type="radio" name="rep" value="alle"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Genarate->"></td>
                            </tr>
                        </table>

                    </form>

                </div>

            </div>



            <div id="bottom">
            </div>
        </div>
    </body>
</html>