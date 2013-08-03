<?php
session_start();
if(!isset($_SESSION['LOG'])){
    header("location:index.php");
}

include_once("class/Course.php");
include_once("class/Exam.php");

$co=new Course();
$Courses=$co->getAllActiveCourses();
$_SESSION['Course']=serialize($Courses);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Examination Officer:Add New Exam</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="Style/default2.css" rel="stylesheet" type="text/css" />
        <script language="javascript" type="text/javascript" src="javascript/ExaminationOfficerAddnewExam.js"></script>
        <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>
        <script language="javascript" src="javascript/validate.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="sidebar">
            <div id="logo">
                <h1><a href="#">IHRA Exam </a></h1>
                <h2><a href="http://www.ucsc.cmb.ac.lk"></a></h2>
            </div>
            <div id="menu" class="boxed">
                <div class="content">
                    <ul>
                        <li class="active"><a href="ExaminationOfficer.php" title="">HOME</a></li>
                        <li><a href="" title="">Add New Exam</a></li>
                        <li><a href="ExaminationOfficerRegisterStudent.php" title="">Register For Exam</a></li>
                        <li><span ><b>Add Marks</b></span>
                            <form action="ExaminationOfficerAddMarks.php" method="post" name="form2" class="style3" id="form2">

                                <span class="style3">

                                </span>                              <br />
                                <select name="SelExamCombo" id="SelExamCombo">
                                    <?php
                                    $exa=new Exam();
                                    $exams=unserialize($_SESSION['Exam']);

                                    foreach($exams as $e){
                                        echo "<option>";
                                        echo $e->Examid;
                                        echo "</option>";
                                    }


                                    ?>
                                </select>
                                <br />
                                <input type="submit" value="select">
                            </form>

                        </li>
                        <li><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a></li>
                        <li><a href="ExaminationOfficerReports.php" title="">Reports</a></li>
                         <li><a href="ExaminationOfficerResetAttempt.php" title="">Reset Attempt</a></li>
                        <li><a href="ChangePassword.php" title="">PassWord&Settings</a></li>
                        <li><a href="Script/Logout.php" title="">Logout</a></li>

                    </ul>
                </div>
            </div>

            <div id="updates" class="boxed">
                <h2 class="title">Recent Updates</h2>
                <div class="content">
                    <ul>
                        <?php

                        include_once('class/News.php');
                        $news=new News();
                        if(isset($_SESSION['news'])){
                            $new=unserialize($_SESSION['news']);
                        }
                        else{
                            $new=$news->setNewsItems();
                            $_SESSION['news']=serialize($new);
                        }


                        if(is_array($new)){
                            foreach($new as $ne){
                                echo "<li>";
                                echo "<h3>$ne->Date</h3>";
                                echo "<p><u>$ne->Item</u></p>";
                                echo "</li>";

                            }
                        }
                        else{
                            echo "<li>";
                            echo "no news added by the adminstrator";
                            echo "</li>";
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>


        <div id="main">
            <div id="welcome" class="post">

                <h2 class="title">Examination System</h2>

                <div class="meta">
                    <p>Examination System was developed by <a href="index.php">2007ict Batch</a><br />
                    <a href="#">please visit ucsc site for information</a> | <a href="ucsc.cmb.ac.lk">UCSC</a> | <a href="www.ucsclodge.lk">UCSC lodge</a></p>
                </div>
                <div class="story">


                    <p>&nbsp;</p>
                    <form id="form1" name="form1" method="post" action="">
                        <label for="SelCourseCombo" class="style4">Select Course</label>
                        <select name="SelCourseCombo" id="SelCourseCombo">
                            <?php
                            foreach($Courses as $cs){
                                echo "<option>$cs->Ac_id</option>";
                            }
                            ?>



                        </select>
                        <input type="button" value="OK" onclick="setSubjects()">
                    </form>
                    <p>&nbsp;</p>
                    <form id="form2" name="form2" method="post" action="Script/ExaminationOfficerAddnewExam.php" onsubmit="return checkText()">


                        <div style=" text-align:right;">

                        <fieldset id="subresult">

                            <legend>Select Subject</legend>



                        </fieldset>
                        <p>&nbsp;</p>
                        <div>







                        <table width="66%" border="0" cellpadding="20" cellspacing="10">
                            <tr>
                                <td class="style4"><label for="DateText">
                                        <div align="center">Exam Identity</div>
                                    </label>
                                    <div align="center">
                                        <input type="text" name="Examid" id="Examid" />
                                </div></td>
                                <td class="style4"><label for="TimeText">
                                        <div align="center">Exam Name</div>
                                    </label>
                                    <div align="center">
                                        <input type="text" name="ExamName" id="ExamName" />
                                </div></td>
                                <td class="style4"><label for="DuText">
                                        <div align="center">Assignment Percentage</div>

                                    </label>

                                    <div align="center">
                                        <input type="text" name="AssignmentPerc" id="AssignmentPerc" />
                                </div></td>

                            </tr>

                            <tr>
                                <td class="style4"><label for="DuText">
                                        <div align="center">A :from</div>
                                    </label>

                                    <div align="center">
                                        <input type="text" name="Afrom" id="Afrom" />
                                </div></td>
                                <td class="style4"><label for="DuText">
                                        <div align="center">B :from</div>
                                    </label>

                                    <div align="center">
                                        <input type="text" name="Bfrom" id="Bfrom" />
                                </div></td>
                                <td class="style4"><label for="DuText">
                                        <div align="center">C : from</div>
                                    </label>

                                    <div align="center">
                                        <input type="text" name="Cfrom" id="Cfrom" />
                                </div></td>
                                <td class="style4"><label for="DuText">
                                        <div align="center">D : from</div>
                                    </label>

                                    <div align="center">
                                        <input type="text" name="Dfrom" id="Dfrom" />
                                </div></td>
                            </tr>
                            <tr>
                                <td class="style4"><div align="center"></div></td>
                                <td class="style4"><div align="center"></div></td>
                                <td class="style4"><label for="Submit">
                                        <div align="center">
                                            <input type="submit" name="Submit" id="Submit" value="Add Exam" />
                                        </div>
                                </label></td>
                            </tr>
                        </table>
                        <p>
                            <label for="Add Exam"></label>

                        </p>

                    </form>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
            <div id="example" class="post">
                <h2 class="title">&nbsp;</h2>

            </div>
        </div>
        <div id="footer">
            <p id="legal">Copyright &copy; 2008 IHRA Examination Department. All Rights Reserved. </p>
            <p id="links"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
        </div>
    </body>
</html>
