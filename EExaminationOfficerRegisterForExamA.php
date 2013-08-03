<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Course.php");
$cors=new Course();
$courses=$cors->getAllActiveCourses();
$_SESSION['courses']=serialize($courses);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Exofficer-Register for exam</title>
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
.style1 {	font-size: 10pt;
	color: #000099;
}
#apDiv3 {
	position:absolute;
	width:123px;
	height:52px;
	z-index:3;
	top: 183px;
	left: 56px;
	text-decoration:blink;
	text-shadow:#0066FF;
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
          <br/>
          <span class="style3">Register for exam</span><br/>
          <br/><br/><br/><br/>
          <form action="Script/EExaminationOfficerRegisterForExamA.php">
            <p>&nbsp;</p>
            <p>Select Course</p>
            <p>
              <select name="course">
                <?php
if(is_array($courses)){
    foreach($courses as $course){
        echo "<option>$course->Ac_id</option>";
    }
}


?>
              </select>
              <input type="submit"  value="Next"/>
             </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
         
		  </div>

		</div>


</div>
	  <div id="bottom">
	  </div>
	
</body>
</html>