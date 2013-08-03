<?php
session_start();
if($_SESSION['LOG']!='A'){
    header("location:index.php");
}
require_once("class/Course.php");
$co=new Course();
$corses=$co->getAllActiveCourses();
$_SESSION['courses']=serialize($corses);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Admin-Close active course</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />
        <script language="javascript" type="text/javascript" src="javascript/AdminAddnewActiveCourse.js"></script>
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
              <br />              
              <span class="style3">Close active course</span><br />              
              <br />              <br />              <br /><br />
                Please make sure you select the correct course<br/>
                <b>This process is not reversible</b><br/>
                    <form action="Script/AdminCloseActiveCourse.php">
                    <select name="coures">
                    <option>--select--</option>
                   <?php
                   if(is_array($corses)){
                       foreach($corses as $cors){
                           echo "<option>$cors->Ac_id</option>";
                       }
                   }
                   ?>

                   </select>


<input type="submit" value="Close:("/>
                    </form>
                    <br /><br /><br /><br /><br /><br /><br /><br />
                    <br /><br /><br /><br /><br /><br />
                </div>

            </div>



            <div id="bottom">
            </div>
        </div>
    </body>
</html>