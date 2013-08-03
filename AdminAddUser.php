<?php
session_start();
if($_SESSION['LOG']!='A'){
    header("location:index.php");
}

require_once("class/Login.php");
?>               
                      
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Admin-Add user</title>
        <script language="javascript" type="text/javascript" src="javascript/AdminAddUser.js"></script>

 <script language="javascript" src="javascript/validate.js" type="text/javascript"></script>
 <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
<script src="javascript/jquery.js" type="text/javascript" language="javascript"></script>
        <script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#username").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("Script/user_availability.php",{ user_name:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('This User name Already exists').addClass('messageboxerror').fadeTo(900,1);
			});	
			document.form1.Save.disabled=true;
	
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Username available to register').addClass('messageboxok').fadeTo(900,1);	
			});
            document.form1.Save.disabled=false;
		  }
				
        });
 
	});
});
</script>
<script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#Usertype").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("Script/countExofficers.php",{ user_type:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{
			  //add message and change the class of the box and start fading
			  $(this).html('Cannot add more officers, Please remove one first (max 2)').addClass('messageboxerror').fadeTo(900,1);
			});
			document.form1.Save.disabled=true;
			document.form1.username.disabled=true;

          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{
			  //add message and change the class of the box and start fading
			  $(this).html('continue').addClass('messageboxok').fadeTo(900,1);
			});
            document.form1.Save.disabled=false;
			document.form1.username.disabled=false;
		  }

        });

	});
});
</script>
        <style type="text/css">
body {
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
}
.top {
margin-bottom: 15px;
}
.messagebox{
	position:absolute;
	width:100px;
	margin-left:30px;
	border:1px solid #c93;
	background:#ffc;
	padding:3px;
}
.messageboxok{
	position:absolute;
	width:auto;
	margin-left:30px;
	border:1px solid #349534;
	background:#C9FFCA;
	padding:3px;
	font-weight:bold;
	color:#008000;
	
}
.messageboxerror{
	position:absolute;
	width:auto;
	margin-left:30px;
	border:1px solid #CC0000;
	background:#F7CBCA;
	padding:3px;
	font-weight:bold;
	color:#CC0000;
}
        
<style type="text/css">
<!--
#apDiv1 {
	position:relative;
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
	text-shadow:#0066FF;
}
.style1 {
	font-size: 10pt;
	color: #000099;
}
-->
        </style>
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:4;
	left: 700px;
	top: 354px;
}
.style2 {
	color: #3366CC;
	font-size: 18px;
	font-weight: bold;
}
.style3 {font-size: 14px}
-->
        </style>
</head>
<body>
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
          <br/>
          <span class="style2">Add User</span><br/>
          <br/><br/>
		    
           <form id="form1" name="form1" method="post" action="Script/AdminAddUser.php" >
                        <div id="apDiv1">  
                        <center><b>Current Users</b></center>  � 
                          <table cellpadding="2" width="100%" style="text-align:center" border="1" bgcolor="#66CCFF">
                    <?php
                        $log=new Login();
                        $users=$log->getUsers();
                        $_SESSION['user']=serialize($users);
                            foreach($users as $user){
                               echo "<tr>";
                               echo "<td>$user->UserName</td><td>$user->AccessLevel</td><td><a href=\"Script/AdminAddUser.php?remove=$user->UserName\" onclick=\"return  areYouSure()\">remove</a></td>";
                               echo "</tr>";
                            }





                    ?>
             </table></div>
             �
             �
             �
             �
             �
             <span>&nbsp;</span>
<table width="250" border="0" cellspacing="10" >
                            <tr>
                                <td class="style3 style5">User Type</td>
                                <td><label for="Usertype"></label>
                                    <select name="Usertype" id="Usertype">
                                        <option>ExaminationOfficer</option>
                                        
                                        <option>RegistrationOfficer</option>
                                        <option selected name="default">-select the user-</option>option>

                                        
                                      
                                       


                                </select>        </td>
                            </tr>
                            <tr>
                                <td class="style3 style5">User Name:</td>
<td><label for="Password"></label>
                                  <span id="sprytextfield1"><span id="sprytextfield6">
                                  <input name="username" type="text" id="username" value="" maxlength="15" />
                                  </span><span class="textfieldRequiredMsg">A value is required.</span></span><span id="msgbox" style="display:none"></span>

                                 <span id="msgbox" style="display:none"></span>                                </td>
                            </tr>
                            <tr>
                                <td class="style3 style5">Password</td>
<td><label for="Password"></label>
                                  <span id="sprytextfield2"><span id="sprytextfield7">
                                  <input type="text" name="Password" id="Password" />
                                  <span class="textfieldRequiredMsg">A value is required.</span></span><span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td class="style3 style5">&nbsp;</td>
                              <td><input type="button" value="random" onclick="genaratePassword();" /></td>
                            </tr>
                            <tr>
                              <td class="style3 style5">Name</td>
                            <td><span id="sprytextfield3"><span id="sprytextfield8">
                                <label>
                                <input type="text" name="Name" id="Name" />
                                </label>
                              <span class="textfieldRequiredMsg">A value is required.</span></span><span class="textfieldRequiredMsg">A value is required.</span></span></td>
                          </tr>
                            <tr>
                              <td class="style3 style5">Address</td>
                              <td><label>
                                <input type="text" name="Add" id="Add" />
                              </label></td>
                            </tr>
                            <tr>
                              <td class="style3 style5">Telephone No</td>
                          <td><span id="sprytextfield5"><span id="sprytextfield9">
                              <label>
                              <input type="text" name="Tpno" id="Tpno" />
                              </label>
                              <span class="textfieldRequiredMsg">A value is required.</span></span><span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                            </tr>
                            <tr>
                              <td class="style3 style5">NIC no</td>
                            <td><span id="sprytextfield10">
                            <label>
                            <input type="text" name="Nic" id="Nic" />
                            </label>
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                          </tr>
                            <tr>
                                <td class="style3 style5">&nbsp;</td>
                                <td><label for="Save"></label>
                                <input type="submit" name="Save" id="Save" value="Add" /></td>
                            </tr>
             </table>
            </form>
            <p>&nbsp;</p>
               


  </div>
  </div>
	  <div id="bottom">
</div>
	
     
      <script type="text/javascript">
<!--
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {validateOn:["blur"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {validateOn:["blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "custom", {validateOn:["change"], pattern:"000000000B"});
//-->
</script>
</body>
</html>


