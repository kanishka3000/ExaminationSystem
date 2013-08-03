<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Examination.php");
$exa=new Examination();
$examinations=$exa->getAllActiveExaminations();
//$examinations=$exa->getAllExaminations();
$_SESSION['Examinations']=serialize($examinations);

?>     

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Exofficer-Add marks</title>
        <script language="javascript" type="text/javascript" src="javascript/AdminAddUser.js"></script>
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
	top: 170px;
	left: 46px;
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
           
            
            
        <br />
            <br/><br /><be>
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
                <span class="style3">Add Marks</span><br />
                <br /><br /><br />
                
  <form action="Script/EExaminationOfficerAddMarks.php">
                    <p>&nbsp;</p>
                    <select name="Exam">
                        <?php
                        if(is_array($examinations)){
                            foreach($examinations as $exas){
                                echo "<option title=\"$exas->ExaminationName :$exas->year year :$exas->Semester semester\">$exas->Exa_id</option>";


                            }
                        }

                        ?>

                    </select>
                    <input type="submit" value="Next" />
                    <div>
                        <table border="1">
                            <tr>
                                <td>ExaminId</td>
                                <td>Name</td>
                                <td>Start Date</td>
                                <td>Year</td>
                                <td>Semester</td>
                                <td>Course</td>

                            </tr>
                            <?php
                            if(is_array($examinations)){
                                foreach($examinations as $exas){
                                    echo "<tr>";
                                    echo "<td>$exas->Exa_id</td><td>$exas->ExaminationName</td><td>$exas->StartDate</td><td>$exas->year</td><td>$exas->Semester</td><td>$exas->C_id</td>";
                                    echo "</tr>";
                                }
                            }


                            ?>
                        </table>

                    </div>
                    <br /><br />
                    <br />
                    <br />
                    <br />

                </form>
                <br/>
                <form action="Script/EExaminationOfficerAddMarksEnter.php" enctype="multipart/form-data" method="post">
                    <input type="file" name="ExcellSheet">
                    <input type="submit" value="Enter" />
                </form>
                
                <br />
                <br />
                <br />
                <br />



            </div>
        </div>
        <div id="bottom">
        </div>

    </body>
</html>


