<?php
session_start();
require_once("class/Course.php");
$course=new Course();
$courses=$course->getTotalActiveCourses();
$_SESSION['Courses']=serialize($courses);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Exofficer-Transcript Semester</title>
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
          <form action="Script/ExaminationOfficerTranscriptSemester.php">
                    <div id="stuff">
                    <br /><br /><br /><br /><br /><br /><br />
                        Please select Year as 1 for Diplomas and Semesters appropriately<br/>

                        <input type="hidden" value="final" name="final"/>
                        Select the Course<br/><select  id="course" name="course" size="4">
                            <?php
                            // echo "<option>--select--</option>";
                            if(is_array($courses)){
                                foreach($courses as $cor){
                                    echo "<option>$cor->Ac_id</option>";
                                }

                            }
                            else{
                                echo "no options";
                            }
                            ?>
                        </select>




                        <p>&nbsp</p>
                        <!--
<table>
<tr>
<td>ExaminationId:</td>
<td><input type="text" name="examinationId" ></td>
<td>ExaminationName</td>
<td><input type="text" name="examinationName"></td>
</tr>
<tr>
<td>Start Date</td>
<td><input type="text" name="startDate"></td>
<td>End Date</td>
<td><input type="text" name="endDate"></td>
</tr>
<tr>
<td>In Charge:</td>
<td><input type="text" name="inCharge"></td>
<td>Location:</td>
<td><input type="text" name="location"></td>
</tr>

</table>

                        -->
                        <p>&nbsp</p>
                        Transcript with year segments
<input type="submit" value="next->"/>
                    </div>
                </form>
                <br /><br /><br /><br /><br /><br />
            </div>
            <div id="bottom">
            </div>
        </div>
    </body>
</html>
