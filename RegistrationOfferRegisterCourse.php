<?php
session_start();
if($_SESSION['LOG']!='R'){
    header("location:index.php");
}
require_once("class/Student.php");
require_once("class/Course.php");
$couse=new Course();
$activeCoruses=$couse->getAllActiveCourses();
$_SESSION['activecourse']=serialize($activeCoruses);
$name=$_SESSION['regn'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>RegOfficer-Register Student for course</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />
        <script language="javascript" src="javascript/RegistrationofficerRegisterCourse.js"></script>
        <script language="javascript" src="javascript/Ajax.js"></script>
        <script src="javascript/jquery.js" type="text/javascript" language="javascript"></script>
        <script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#indexno").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("Script/chkRegR.php",{ user_name:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('This Registration ID Already exists').addClass('messageboxerror').fadeTo(900,1);
			});	
			document.form1.submit.disabled=true;
	
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Registration ID available').addClass('messageboxok').fadeTo(900,1);	
			});
            document.form1.submit.disabled=false;
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
.style2 {	color: #3366CC;
	font-size: 18px;
	font-weight: bold;
}
#apDiv4 {
	position:absolute;
	left:370px;
	top:353px;
	width:143px;
	height:35px;
	z-index:1;
}
#apDiv5 {
	position:absolute;
	left:659px;
	top:536px;
	width:165px;
	height:255px;
	z-index:1;
}
            -->
        </style>
</head>
    <body >

        <div ></div>
        <div ></div>
<div id="wrapper">
            <div id="top">
            </div>
            <div id="content">
                <div id="menu">
           
            
            
        <br />
            <br/>
            <div class="style1" id="apDiv3">
             <b> Welcome:&nbsp;</b>Registration officer:&nbsp;<?php echo "<strong> $name </strong> "?> </p>
          </div>
          
            <br/>
          <br />
            
              <ul>
                        
                        <li ><a href="RegistrationOfficer.php" title="">Home</a></li>
                        <li><a href="RegistrationOfficerRegisterStudent.php">Register Student</a></li>
                        <li><a href="RegistrationOfferRegisterCourse.php" title="">Register Student for course</a></li>
                        <li><a href="OfficerUpdateStudentInformation.php" title="">Update Stuudent Information</a></li>
                        <li><a href="Script/Logout.php" title="">Logout</a></li>
                        <li ></li>
                        </ul>
              </div>
                <div id="stuff">
                
              <br />
              <span class="style2">Register Student for the course</span><br />
              <br /><br /><br /><br /><br />
                    <?php
                    if(isset($_SESSION['sterror'])){
                        echo "<b>The student was unspecified please set</b><br/>";
                    }



                    $student;
                    if(isset($_REQUEST['loadstudent'])){
                        echo "student existing<br/>";
                        $student=unserialize($_SESSION['student']);

                        //  print_r($student);
                    }else{
                        $student=new Student();
                        echo "Please enter the National Identicard No to register the stuent<br/>";
                        echo "<input type=\"text\" name=\"nid\" id=\"nid\"/>";
                        echo "<input type=\"button\" name=\"ok\" id=\"ok\" value=\"search\" onclick=\"studentExist()\"/>";
                    }
                    //print_r($student);
                    echo "<table>";
                    echo "<tr><td>National Identicard No</td><td><span id=\"nid\">$student->RegistrationNo</span></td></tr>";
                    echo "<tr><td>Name:</td><td><span id=\"name\">$student->Name</span></td></tr>";
                    echo "<tr><td>Address:</td><td><span id=\"address\">$student->Address</span></td></tr>";
                    echo "<tr><td>secondary Address:</td><td><span id=\"saddress\">$student->Address2</span></td></tr>";
                    echo "<tr><td>Telephone</td><td><span id=\"telephone\">$student->Telephone</span></td></tr>";
                    echo "<tr><td>Mobile phone No</td><td><span id=\"mobile\">$student->Mobile</span></td></tr>";
                    echo "<tr><td>University</td><td><span id=\"university\">$student->University</span></td></tr>";
                    echo "<tr><td>Image</td><td><span id=\"image\"> <img src=\"$student->Photo\"  width=\"100\" height=\"100\"/></span></td></tr>";
                    echo "</table>";
                    ?>
                    <br/>
                    <div>
                        <form action="Script/RegistrationofficerRegisterCourse.php" name="form1" id="form1">
                            <input type="hidden" name="acset" value="acset"/>
                            Please enter the Registration Id<br/>
                          
                            <input type="text" name="indexno" id="indexno" />
                        <br/>
                    <span id="msgbox" style="display:none"></span> 
                    <div id="apDiv5">
<select name="accorse" size="15">
                                <?php
                                if(is_array($activeCoruses)){
                                    foreach($activeCoruses as $activecourse){
                                        echo "<option title=\"$activecourse->C_id:$activecourse->CourseName\">$activecourse->Ac_id</option>";
                                    }
                                }else{
                                    echo "<option>Nocourses</option>";
                                }




                                ?>

                            </select>
                            </div>
          <br/>
                            <br/>
                            <input type="submit" value="Register->" name="submit" id="submit"/>
                        </form>
                        <br /><br/><br/><br/><br/><br/><br/><br/><br/>
                    </div>




                </div>

            </div>



            <div id="bottom">
            </div>
        </div>
    </body>
</html>



