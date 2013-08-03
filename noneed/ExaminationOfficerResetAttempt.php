<?php
session_start();
if(!isset($_SESSION['LOG'])){
    header("location:index.php");
}
include_once("class/Exam.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Rounded Two | Home</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style/style2.css" />
<script language="javascript" type="text/javascript" src="javascript/EExaminationOfficerAddNewExam.js"></script>
 <script language="javascript" type="text/javascript">
            function dummyGetSubjects(){
                var sub=document.getElementById("registrationid");
                var te=sub.value;
                var s=document.getElementById('subjects');
              //  alert(te);
                var pa=document.createElement('table');

                 var tra=document.createElement('tr');
                var tda=document.createElement('td');
                var tdb=document.createElement('td');
                var tdc=document.createElement('td');
                tda.innerHTML="&nbsp subject &nbsp";
                tdb.innerHTML="&nbsp Attempt &nbsp";
                tdc.innerHTML="&nbsp select &nbsp";
                tra.appendChild(tda);
                tra.appendChild(tdb);
                tra.appendChild(tdc);
                pa.appendChild(tra);

                s.appendChild(pa);





                var tr=document.createElement('tr');
                var td1=document.createElement('td');
                var td2=document.createElement('td');
                var td3=document.createElement('td');
                td1.innerHTML="Ict1001";
                td2.innerHTML="2";
                td3.innerHTML="<input type=\"checkbox\">";
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                pa.appendChild(tr);

                s.appendChild(pa);


                 var trk=document.createElement('tr');
                var td4=document.createElement('td');
                var td5=document.createElement('td');
                var td6=document.createElement('td');
                td4.innerHTML="Ict1006";
                td5.innerHTML="2";
                td6.innerHTML="<input type=\"checkbox\">";
                trk.appendChild(td4);
                trk.appendChild(td5);
                trk.appendChild(td6);
                pa.appendChild(trk);

                s.appendChild(pa);
                var but=document.createElement('input');
                but.type="button";
                but.value="ok";
                s.appendChild(but);
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
	text-decoration:blink;
	text-shadow:#0066FF;
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
      <span>&nbsp;</span>
<div class="style1" id="apDiv3">
              <p align="justify"><strong> Welcome</strong>: Examination Officer</p>
            </div>
            
            <p><br />
              </p>
            <p>&nbsp;</p>
            <p><br />
            </p>
            <ul>
					<li ><a href="#" title="">Home</a></li>
                        <li><a href="#">Add New Exam</a></li>
                        <li><a href="EExaminationOfficerRegisterForExamA.php" title="">Register For Exam</a></li>
              <li><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a></li>
                        <li><a href="ExaminationOfficerReports.php" title="">Reports</a></li>
                        <li><a href="ExaminationOfficerResetAttempt.php" title="">Reset Attempt</a></li>
                        <li><a href="ChangePassword.php" title="">PassWord&Settings</a></li>
                        <li><a href="Script/Logout.php" title="">Logout</a></li>
		</ul>
		  </div>
		  <div id="stuff">
           Enter the Registration id :<input type="text" name="registrationid" onblur="dummyGetSubjects();" id="registrationid"/>
                    <div id="subjects">


                    </div>
                    <p>&nbsp;</p>

		</div>


</div>
</div>
	  <div id="bottom">
	  </div>
	
</body>
</html>