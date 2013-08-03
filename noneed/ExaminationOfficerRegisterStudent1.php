<?php
session_start();
if(!isset($_SESSION['LOG'])){
    header("location:index.php");
}

include("class/Exam.php");

$exams=unserialize($_SESSION['Exam']);
?>
                      
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>EMIS| Admin</title>
        <script language="javascript" type="text/javascript" src="javascript/EExaminationOfficerAddNewExam.js"></script>
        <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>
<script language="javascript" type="text/javascript" src="javascript/AdminAddUser.js"></script>
<script language="javascript" src="javascript/validate.js" type="text/javascript"></script>
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
	top: 163px;
	left: 63px;
	text-decoration:blink;
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
			
<span>&nbsp;</span>
            
	    <div id="menu">
            <span>&nbsp;</span>
          <br />
           
            <div class="style1" id="apDiv3">
              <p align="justify"><strong> Welcome</strong>: Examination Officer</p>
          </div>
  <br />
            <br/>
            <br />
            
<ul>
					  <li class="active"><a href="#" title="">Home</a></li>
                      <li class="active"><a href="EExaminationOfficerAddNewExam.php">Add New Exam</a></li>
        <li><a href="EExaminationOfficerRegisterForExamA.php" title="">Register For Exam</a><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a><a href="ExaminationOfficerReports.php" title="">Reports</a><a href="ExaminationOfficerResetAttempt.php" title="">Reset Attempt</a><a href="ChangePassword.php"
                       title="">Password&amp;Settings</a><a href="Script/Logout.php"
                       title="">Logout</a></li>
        <li></li>
		  </ul>
		</div>
		  <div id="stuff">
          <form id="form1" name="form1" method="post" action="Script/ExaminationOfficerCloseExam.php">
    <label for="SelExamCombo" class="style3 style5">Select the exam</label>
    <p><select name="exam" id="exam">
    <?php
    foreach($exams as $e){
    echo "<option>";
    echo $e->Examid;
    echo "</option>";
}


    ?>


      </select>
    </p>
    <p>
      <label for="Close it"></label>
      <input type="submit" name="Close it" id="Close it" value="Close it" />
</p>
    <p>&nbsp;</p>
          </form>
                    

  </div>
  </div>
  </div>
	  <div id="bottom">
	  </div>
	
</body>
</html>


