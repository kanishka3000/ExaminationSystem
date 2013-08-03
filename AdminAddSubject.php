<?php
session_start();
if($_SESSION['LOG']!='A'){
    header("location:index.php");
}


?>                   
                      
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Admin-Close active course</title>
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
 <script language="javascript" type="text/javascript">
            function dummySubjectCreation(){
                var fin=document.getElementById('fin');
                alert('hi');
//                var table=document.createElement('table');
//                var trt=document.createElement('tr');
//                var tdt1=document.createElement('td');
//                var tdt2=document.createElement('td');
//                var tdt3= document.createElement('td');
//                for(var i=0;i<4;i++){
//
//                var ctable1=document.createElement('table');
//                 var ctr1=document.createElement('tr');
//                 var ctd1=document.createElement('td');
//                 var ctd2=document.createElement('td');
//                 ctd1.innerHTML="Subject Id";
//                 ctd2.innerHTML="<input type=\"text\">";
//                 ctr1.appendChild(ctd1);
//                 ctr1.appendChild(ctd2);
//
//                  var c2tr1=document.createElement('tr');
//                 var c2td1=document.createElement('td');
//                 var c2td2=document.createElement('td');
//                 ctd1.innerHTML="Subject Id";
//                 ctd2.innerHTML="<input type=\"text\">";
//                 c2tr1.appendChild(c2td1);
//                 c3tr1.appendChild(c2td2);
//
//                  var c3tr1=document.createElement('tr');
//                 var c3td1=document.createElement('td');
//                 var c3td2=document.createElement('td');
//                 ctd1.innerHTML="Subject Id";
//                 ctd2.innerHTML="<input type=\"text\">";
//                 c3tr1.appendChild(c3td1);
//                 ct3r1.appendChild(c3td2);







                 //}
fin.style.visibility="visible";





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
          <ul><li></li>
				</ul>
		</div>
		  <div id="stuff">
             The Subject entry for new Course:XXX<br/>
                    Year 1 of X years</b>
                    <p>&nbsp;</p>
                    <p>
                  <table border="0" >
                            <tr>
                                <td height="33">Enter no of Subjects for this year(Year X)</td>
                                <td><input type="text"></td>
                                <td><input type="button" value="create" onclick="dummySubjectCreation()"></td>
                            </tr>

                  </table>
                        <p>&nbsp;</p>
                  <div id="fin" style="visibility:hidden">
                            <table width="200" border="0">
  <tr>
    <td> <table width="200" border="1">
                              <tr>
                                <td>Subject Id </td>
                                <td><input type="text" name="textfield" /></td>
                              </tr>
                              <tr>
                                <td>Subject Name </td>
                                <td><input type="text" name="textfield2" /></td>
                              </tr>
                              <tr>
                                <td>Minimum Attendance </td>
                                <td><input type="text" name="textfield3" /></td>
                              </tr>
                              <tr>
                                <td>Semester</td>
                                <td><input type="text" name="textfield4" /></td>
                              </tr>
                              <tr>
                                <td height="57">Description:</td>
                                <td><input type="text" name="textfield5" /></td>
                              </tr>
                            </table></td>
    <td><table width="200" border="1">
                              <tr>
                                <td>Subject Id </td>
                                <td><input type="text" name="textfield6" /></td>
                              </tr>
                              <tr>
                                <td>Subject Name </td>
                                <td><input type="text" name="textfield7" /></td>
                              </tr>
                              <tr>
                                <td>Minimum Attendance</td>
                                <td><input type="text" name="textfield8" /></td>
                              </tr>
                              <tr>
                                <td>Semester</td>
                                <td><input type="text" name="textfield9" /></td>
                              </tr>
                              <tr>
                                <td height="58">Description:</td>
                                <td><input type="text" name="textfield10" /></td>
                              </tr>
                            </table></td>
    <td><table width="200" border="1" cellpadding="1">
                              <tr>
                                <td>Subject Id</td>
                                <td><input type="text" name="textfield11" /></td>
                              </tr>
                              <tr>
                                <td>Subject Name </td>
                                <td><input type="text" name="textfield12" /></td>
                              </tr>
                              <tr>
                                <td>Minimum Attendance</td>
                                <td><input type="text" name="textfield122" /></td>
                              </tr>
                              <tr>
                                <td>Semester</td>
                                <td><input type="text" name="textfield123" /></td>
                              </tr>
                              <tr>
                                <td height="60">Description:</td>
                                <td><input type="text" name="textfield124" /></td>
                              </tr>
                            </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input type="submit" name="Submit" value="Next"  onclick="dummySubjectCreation()"/>
    </div></td>
  </tr>
</table>
          
         


	    </div>
  </div>
  </div>
	  <div id="bottom">
	  </div>
	
</body>
</html>


