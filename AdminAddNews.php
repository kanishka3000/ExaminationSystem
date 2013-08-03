<?php
session_start();
if(!isset($_SESSION['LOG'])){
    header("location:index.php");
}

?>                      
                      
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>EMIS| Admin</title>
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
	top: 160px;
	left: 103px;
	text-decoration:blink;
	text-shadow:#0066FF;
}
.style1 {
	font-size: 10pt;
	color: #000099;
}
.style3 {font-size: 14pt;
	font-weight: bold;
	color: #0066FF;
}
-->
</style>
</head>
<body>
<div id="wrapper">
		<div id="top">
		</div>
	  <div id="content">
			

	    <div id="menu">
            <span>&nbsp;</span>
            <span>&nbsp;</span>
            <span>&nbsp;</span>
            <br />
            <br/>
            <div class="style1" id="apDiv3">
              <p align="justify"><strong> Welcome</strong>: Admin</p>
          </div>
          <br />
            <br/>
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
          <span class="style3">Add news</span><br />
<br /><br /><br /><br />
              <form method="POST" action="Script/AdminAddNews.php" onsubmit="return checkTextArea()">
                <span>Enter the News item :</span>	<br/>
                <textarea rows="10" cols="60" name="data">type the news </textarea>
                <input type="submit" value="Enter">
            </form>
            <hr/>
            &nbsp;

             <form method="POST" action="Script/AdminAddNews.php">
                <span>Clear News :</span>	<br/>

                        <input type="hidden" name="clear" value="true">
                <input type="submit" value="Clear">
            </form>
          
          <br />
		    <br />
			<br />
			<br />
			<br />


	    </div>
  </div>
	  <div id="bottom">
	  </div>
	</div>
</body>
</html>


