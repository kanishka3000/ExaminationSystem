<?php
session_start();
require_once("class/Course.php");
$corse=new Course();
$allcourses=$corse->getAllCourses();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Rounded Two | Home</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />
        <script language="javascript" type="text/javascript" src="javascript/AdminAddNewCourseA.js"></script>
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
              <p align="justify"><strong> Welcome</strong>: Admin</p>
          </div>
          
            <br/>
<br />
                   <ul>
					  <li class="active"><a href="Admin.php" title="">Home</a></li>
              <li><a href="AdminAddNews.php" title="">Add News</a></li>
              <li><a href="AdminAddUser.php"
                       title="">Add User</a><a href="AdminReports.php"
                       title="">Reports</a><a href="AdminAddnewActiveCourse.php"
                       title="">Add new Active course</a><a href="AdminCloseActiveCourse.php"
                       title="">Close Active course</a><a href="ChangePassword.php"
                       title="">Password&amp;Settings</a><a href="AdminAddNewCourseA.php" title="">Add New Course</a><a href="Script/Logout.php"
                       title="">Logout</a></li>
                           <li>&nbsp;</li>
<li><a href="Help/index.php">Help</a></li>
<li><a href="AdminAddBackup.php">Back Up Database</a></li>
				</ul>
                </div>
                <div id="stuff">
                <br /><br /><br /><br /><br /><br />
<table border="1">
<head>
<tr>
    <td>Course id</td>
    <td>Course Name</td>
    <td>Lecturer in charge</td>
    <td>No of years</td>
    <td>Degree/Diploma</td>


</tr>
</head>
                    <?php

                   // print_r($allcourses);

                    if(is_array($allcourses)){

                        foreach($allcourses as $courses){
                       echo "<tr>";
                      echo "<td>$courses->C_id</td>";
                      echo "<td>$courses->CourseName</td>";
                      echo "<td>$courses->LecturerInCharge</td>";
                      echo "<td>$courses->Years</td>";
                      echo "<td>";
                      if($courses->Degree=="T"){
                          echo "Degree";

                      }else{
                          echo "Diploma";
                      }
                      echo "</td>";
                       echo "</tr>";



                        }


                    }


                    ?>

                    <!--current reports-->


</table>
<br /><br /><br /><br /><br />
                </div>

            </div>



            <div id="bottom">
            </div>
        </div>
    </body>
</html>


