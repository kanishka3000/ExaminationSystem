<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
//if(!isset($_SESSION['LOG'])){
//    header("location:index.php");
//}

include_once("class/Exam.php");
require_once("class/Course.php");
$exa=new Exam();
$allexams=$exa->selectAllExams();
$cos=new Course();
$course=$cos->getAllActiveCourses();
$_SESSION['corsee']=serialize($course);
$name=$_SESSION['Exnm'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Exofficer-Reports</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style/style2.css" />
<script language="javascript" type="text/javascript" src="javascript/EExaminationOfficerAddNewExam.js"></script>
<script language="javascript" type="text/javascript" src="javascript/ExaminationOfficerRegisterStudent.js"></script>
        <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>
        <script language="javascript" type="text/javascript" >
            function getSubject(){
                var fin=document.getElementById('final');
                var su=document.createElement('input');
                su.type="submit";
                su.value="print";
                fin.appendChild(su);


                alert('You about to create the Report!');
            }
            function createText(){
                var fin=document.getElementById('course2');
                var te=document.createElement('input');
                var sp=document.createElement('span');
                var sub=document.createElement('input');
                sub.type="submit";
                sub.value="Enter";
                sp.innerHTML="Enter the year :";
                te.type="text";
                te.name="year";
                fin.appendChild(sp);
                fin.appendChild(te);
                fin.appendChild(sub);
                //   alert('hi');
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
	text-shadow:#0066FF;
}
.style3 {font-size: 14pt;
	font-weight: bold;
	color: #0066FF;
}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
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
<br/>
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
          <p><span class="style3">Reports</span></p>
                 
                        
                    <!--This is the Deploma one-->
                    <div style="border-style:outset;padding:10px" title="select the course and click ok" name="select the course and click ok">
                       
                            <div align="left"><span class="style4">Genarate Report on Semeser (At request)</span>
                              
                              <br/>
                              <input type="hidden" value="final" name="final"/>
                              <a href="SemWiseReport.php"><img src="images/button1.gif" /></a></div>
                    </div>
                    
<div style="border-style:outset;padding:10px" title="select the course and click ok" name="select the course and click ok">
                       
                            <strong>Genarate Accademic Transcript (At request)</strong>
   <br/>

      <input type="hidden" value="final" name="final"/>
                          
                     
<a href="ExaminationOfficerTranscript.php"><img src="images/button1.gif"></a>

                        
                      
                    </div>
 
<div style="border-style:outset;padding:10px" title="select the course and click ok" name="select the course and click ok">
                       
                            <strong>Genarate Accademic Transcript Semester (At request)</strong>
   <br/>

<input type="hidden" value="final" name="final"/>
                          
                          <a href="ExaminationOfficerTranscriptSemester.php"><img src="images/button1.gif"></a>                


                        
                      
                    </div>
<div style="border-style:outset;padding:10px" title="select the course and click ok" name="select the course and click ok">

                            <strong>Genarate Accademic Examination Reports Year Wise (At request)</strong>

   <br/>
<input type="hidden" value="final" name="final"/>
                            <a href="ExaminationOfficerYearWiseReport.php"><img src="images/button1.gif"></a>







		</div>


                     
<div style="border-style:outset;padding:10px" title="select the course and click ok" name="select the course and click ok">
                       
                            <strong>Genarate Accademic Examination Reports (At request)</strong>
   <br/>

<input type="hidden" value="final" name="final"/>
                            <a href="ExaminationOfficerExamReport.php"><img src="images/button1.gif"></a>
                                   


                        
                      
                    </div>

                    


                  
               


</div>
</div>
<div id="bottom">
	  </div>
	
</body>
</html>