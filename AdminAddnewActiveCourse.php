<?php
session_start();
require_once("class/Course.php");
if($_SESSION['LOG']!='A'){
    header("location:index.php");
}
$co=new Course();
$corses=$co->getAllCourses();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Admin-Add new active course</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />
        <script language="javascript" type="text/javascript" src="javascript/AdminAddnewActiveCourse.js"></script>
        <script src="javascript/jquery.js" type="text/javascript" language="javascript"></script>
        
      
       <script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#acid").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("Script/coursechk.php",{ user_name:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('This ID Already exists').addClass('messageboxerror').fadeTo(900,1);
			});	
			document.form1.save.disabled=true;
	
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('ID available to register').addClass('messageboxok').fadeTo(900,1);	
			});
            document.form1.save.disabled=false;
		  }
				
        });
 
	});
});
</script>
        <style type="text/css">
            <!--
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
         <span class="style3">Add new active course</span><br/>
         <br />
         <br/>
         
          
            <form action="Script/AdminAddnewActiveCourse.php" name="form1">
                    please select a course to add the active course

                        <?php
                      echo "<select name=\"course\" id=\"course\" onchange=\"genarateActiveId()\">";
                      echo "<option>--select--</option>";
                      if(is_array($corses)){
                          
                      foreach($corses as $corse){
                      echo "<option>$corse->C_id</option>";
                      }
                      }
                      echo "</select>";


                        ?>
                        <table>
                        <tr>
                        <td>Active course Id</td>
                        <td><input type="text" name="acid" id="acid"></td>
                         <span id="msgbox" style="display:none"></span> 
                         <td>Batch</td>
                        <td><input type="text" name="batch"></td>
                        </tr>
                        <tr>
                        <td>Start Date</td>
                        <td><input type="text" name="sdate"></td>
                         
                        </tr>
                        
                        </table>
<br>
                    <input type="submit" value="Save" name="save"/>
            </form>
                    <br />
         <br/>
         <br />
         <br/>
         <br />
         <br/>
         <br />
         <br/>
              </div>

            </div>



          <div id="bottom">
          </div>
        </div>
</body>
</html>