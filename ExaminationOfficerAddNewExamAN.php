<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Examination.php");
$examnin=unserialize($_SESSION['Examination']);
$subject=$examnin->Subjects;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Exofficer-Add new exam</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />

        <script language="javascript" type="text/javascript" >

            function checkCheck(){
                alert('check all');

            }

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
			
            -->
        </style>
    </head>
    <body >

        <div id="wrapper">
            <div id="top">
            </div>
            <div id="content">
                <div id="menu">
           
            
            
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
          <form action="Script/ExaminationOfficerAddNewExamAN.php">
                    <div id="stuff">
                    <br /><br /><br /><br /><br />


                         <table border="1">
                            <head>
                                <tr>
                                    <td><input type="checkbox" id="check0" onclick="checkCheck()" checked="true"></td>
                                    <td>Subject Id</td>
                                    <td>Subject Name</td>
                                    <td>Exam id</td>
                                    <td>Assignment Percentage</td>
                                    <td>Attendance Percentage</td>
                                    <td>Value A given:</td>
                                    <td>Value B given:</td>
                                    <td>Value C given :</td>
                                    <td>Value D given</td>

                                </tr>
                            </head>
                            <?php
                            if(is_array($subject)){
                                foreach($subject as $sub){
                                    $examid=$examnin->Exa_id."-".$sub->Sub_id;
                                    echo "<tr>";
                                    echo "<td><input type=\"checkbox\" name=\"ch-$sub->Sub_id\" value=\"$sub->Sub_id\" checked=\"true\"></td>";
                                    echo "<td><span>$sub->Sub_id</span></td>";
                                    echo "<td><span>$sub->SubjectName</span></td>";
                                    echo "<td><input type=\"text\" value=\"$examid\"name=\"Exid-$sub->Sub_id\"></td>";
                                    echo "<td><input type=\"text\"/ size=\"6\" name=\"Assi-$sub->Sub_id\"></td>";
                                    echo "<td><input type=\"text\"/ size=\"6\" name=\"Atte-$sub->Sub_id\"></td>";
                                    echo "<td><input type=\"text\" size=\"6\" name=\"A-$sub->Sub_id\" value=\"70\"/></td>";
                                    echo "<td><input type=\"text\" size=\"6\" name=\"B-$sub->Sub_id\" value=\"55\"/></td>";
                                    echo "<td><input type=\"text\" size=\"6\" name=\"C-$sub->Sub_id\" value=\"40\"/></td>";
                                    echo "<td><input type=\"text\" size=\"6\" name=\"D-$sub->Sub_id\" value=\"30\"/></td>";

                                    echo "</tr>";

                                }

                            }
                            else{
                                echo "No Results";
                            }


                            ?>
                        </table>
                        <input type="submit" value="Next" />
                    </div>
                </form>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            </div>
            <div id="bottom">
            </div>
        </div>
    </body>
</html>

