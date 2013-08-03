<?php
session_start();
if($_SESSION['LOG']!='E'){
    header("location:index.php");
}
require_once("class/Course.php");
$course=new Course();
$courses=$course->getAllCourses();
$_SESSION['Courses']=serialize($courses);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Exofficer-Add new exam</title>
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style/style2.css" />
    <script language="javascript" type="text/javascript" src="javascript/EExaminationOfficerAddNewExam.js"></script>
    <script language="javascript" type="text/javascript" src="javascript/Ajax.js"></script>

    <script src="javascript/jquery.js" type="text/javascript" language="javascript"></script>
    <!--<link rel="stylesheet" type="text/css" href="style/jquery-ui-1.7.1.custom.css" />-->
    <script language="javascript" type="text/javascript" src="javascript/jquery-ui-1.7.1.custom.min.js"></script>
    <script language="javascript" type="text/javascript" src="javascript/jquery-1.3.2.min.js"></script>
    <script language="javascript">
        //<!---------------------------------+
        //  Developed by Roshan Bhattarai
        //  Visit http://roshanbh.com.np for this script and more.
        //  This notice MUST stay intact for legal use
        // --------------------------------->
        $(document).ready(function()
        {
            $("#examinationId").blur(function()
            {
                //remove all the class add the messagebox classes and start fading
                $("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
                //check the username exists or not from ajax
                $.post("Script/examChk.php",{ user_name:$(this).val() } ,function(data)
                {
                    if(data=='no') //if username not avaiable
                    {
                        $("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
                        {
                            //add message and change the class of the box and start fading
                            $(this).html('This ID Already exists').addClass('messageboxerror').fadeTo(900,1);
                        });
                        document.form1.ok.disabled=true;

                    }
                    else
                    {
                        $("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
                        {
                            //add message and change the class of the box and start fading
                            $(this).html('ID available to register').addClass('messageboxok').fadeTo(900,1);
                        });
                        document.form1.ok.disabled=false;
                    }

                });

            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#startDate").datepicker();
        });
    </script>
    <script language="javascript" type="text/javascript" src="javascript/jquery-ui-1.7.1.custom.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#endDate").datepicker();
        });
    </script>

    <style type="text/css">
        <!--
        .messagebox{
            position:relative;
            width:100px;
            margin-left:10px;
            border:1px solid #c93;
            background:#ffc;
            padding:3px;
        }
        .messageboxok{
            position:relative;
            width:auto;
            margin-left:10px;
            border:1px solid #349534;
            background:#C9FFCA;
            padding:3px;
            font-weight:bold;
            color:#008000;

        }
        .messageboxerror{
            position:relative;
            width:auto;
            margin-left:10px;
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
            <form action="Script/EExaminationOfficerAddNewExam.php" id="form1" name="form1">
                <div id="stuff">
                <br />
                <span class="style3">Add new Exam</span><br />
                <br /><br /><br />
                <table width="200" border="0">
                    <tr>
                        <td height="60"><input type="hidden" value="final" name="final"/>
                        Select the Course</td>
                        <td><select onchange="selectCourse();" id="course" name="course">
                                <?php
                                echo "<option>--select--</option>";
                                if(is_array($courses)){
                                    foreach($courses as $cor){
                                        echo "<option>$cor->C_id</option>";
                                    }

                                }
                                else{
                                    echo "no options";
                                }
                                ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td height="53">Select the year </td>
                        <td><select id="year" name="year" onchange="selectYear();">
                                <option>--select--</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td height="57">Select the Semester </td>
                        <td><select id="semester" name="semester" onchange="setSubmit();">
                                <option>--select--</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="button" value="reset"  onclick="reset()"/></td>
                    </tr>
                </table>

                <p>&nbsp</p>
                <p>&nbsp</p>
                <table>
                    <tr>
                        <span id="msgbox" style="display:none"></span>
                        <td>ExaminationId:</td>
                        <td><input type="text" name="examinationId" id="examinationId"></td>

                        <td>ExaminationName</td>
                        <td><input type="text" name="examinationName"></td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td><div class="demo">

                                <input id="startDate" type="text">

                            </div><!-- End demo -->

                            <div style="display: none;" class="demo-description">

                        </div><!-- End demo-description --></td>
                        <td>End Date</td>
                        <td><div class="demo">

                                <p><input id="endDate" type="text"></p>

                            </div><!-- End demo -->

                            <div style="display: none;" class="demo-description">

                        </div><!-- End demo-description --></td>
                    </tr>
                    <tr>
                        <td>In Charge:</td>
                        <td><input type="text" name="inCharge"></td>
                        <td>Location:</td>
                        <td><input type="text" name="location"></td>
                    </tr>

                </table>



            </form>
            <br /><br /><br /><br />
        </div>

    </div>
    <div id="bottom">
    </div>
    </div>
</body>
</html>
