<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Exam.php");
require_once("class/Examination.php");
$exa=new Examination();
$exams=$exa->getAllActiveExaminations();
$_SESSION['Exams']=serialize($exams);
$uexams=$exa->getAllUpdateableExaminations();
$_SESSION['UExams']=serialize($uexams);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Exofficer-Close exam</title>
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
          <br />
          <span class="style3">Close exam</span><br />
          <br /><br /><br /><br /><br />
Please make sure you close the correct examination<br/>
<b>This process is not restorable</b>
<form action="Script/ExaminationOfficerCloseExam.php">
<?php
if(is_array($exams)){
     echo "<select name=\"exam\">";
    foreach($exams as $exam){
   
    echo "<option>$exam->Exa_id</option>";
   
    }
     echo "</select>";
}else{
    echo "no applicable examination";
}

?>
<input type="submit" value="Close --->"/>
</form>

Make the Examination resticted for updating.<br/>
<form action="Script/ExaminationOfficerDeupdatableExam.php">
<?php
if(is_array($uexams)){
       echo "<select name=\"exam\">";
    foreach($uexams as $uexam){
           echo "<option>$uexam->Exa_id</option>";
    }
         echo "</select>";
}else{
    echo "No applicable examination";
}



?>
<input type="submit" value="Stop --->"/>
</form>


<br/>
<table>
<tr>
<td>Exam id</td>
<td>Exam Name</td>
<td>In charge</td>
<td>Start Date</td>
<td>End Date</td>
<td>Course</td>
<td>Year</td>
<td>Semester</td>


</tr>
<!--
 public $Exa_id;
    public $ExaminationName;
    public $TeacherInCharge;
    public $StartDate;
    public $EndDate;
    public $Location;
    public $year;
    public$Semester;

    public $C_id;


-->



<?php
if(is_array($exams)){
    foreach($exams as $exam){
   echo "<tr>";
   echo "<td>$exam->Exa_id</td>";
   echo "<td>$exam->ExaminationName</td>";
   echo "<td>$exam->TeacherInCharge</td>";
   echo "<td>$exam->StartDate</td>";
   echo "<td>$exam->EndDate</td>";
   echo "<td>$exam->C_id</td>";
   echo "<td>$exam->year</td>";
   echo "<td>$exam->Semester</td>";
  


   echo "</tr>";
    }
}else{
    echo "no applicable examination";
}

?>
</table>
<br /><br /><br /><br />
		  </div>

		</div>



	  <div id="bottom">
	  </div>
	</div>
</body>
</html>


