<?php
session_start();
require_once("class/Login.php");
$user=unserialize($_SESSION['user']);
//echo $user->UserName;
//print_r($user);
?>        

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Change password</title>
        <script language="javascript" type="text/javascript" src="javascript/AdminAddUser.js"></script>
        <script language="javascript" src="javascript/validate.js" type="text/javascript"></script>
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
                top: 171px;
                left: 66px;
                text-decoration:blink;
                text-shadow:#0066FF;
            }
            .style1 {
                font-size: 10pt;
                color: #000099;
            }
            .style2 {	color: #3366CC;
                font-size: 18px;
                font-weight: bold;
            }
            -->
        </style>
    </head>
    <body>
        <div id="wrapper">
        <div id="top">
        </div>
        <div id="content">

            <span>&nbsp;</span>

            <div id="menu">
                <span>&nbsp;</span>
                <br />

                <div class="style1" id="apDiv3">
                    <p align="justify"><strong> Welcome</strong>: Admin</p>
                </div>
                <br />
                <br/>
                <br />

                <ul>
                    <?php
                    if($user->AccessLevel=='Administrator'){


                        ?>
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





    <?php
}elseif($user->AccessLevel=='ExaminationOfficer'){

    ?>
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




    <?}elseif($user->AccessLevel=='RegistrationOfficer'){

    ?>
                    <li ><a href="RegistrationOfficer.php" title="">Home</a></li>
                    <li><a href="RegistrationOfficerRegisterStudent.php">Register Student</a></li>
                    <li><a href="RegistrationOfferRegisterCourse.php" title="">Register Student for course</a></li>
                    <li><a href="OfficerUpdateStudentInformation.php" title="">Update Student Information</a></li>
                    <li><a href="Script/Logout.php" title="">Logout</a></li>
                    <li ></li>
                    <?php

                }
                ?>

                    <li class="active"><a href="Admin.php" title="">Home</a></li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li><a href="Script/Logout.php">Log out</a></li>
                    <li></li>
                </ul>
            </div>
            <div id="stuff">
                <span>&nbsp;</span>

                <span>&nbsp;</span><span class="style2">Change Password</span>
                <br /><br /><br /><br /><br />
                <form method="post" action="Script/ChangePassword.php">
                    <table width="70%" border="0" cellspacing="10">
                        <tr>
                            <td>User Name</td>
                            <td><input type="text" name="username" disabled="disabled" value="<?php echo "$user->UserName";?>"/></td>

                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="oldpassword" id="p1"/></td>

                        </tr>

                        <tr>
                        <td>New Password</td>
                        <td><input type="text" name="newpassword"/></td>
                        <!--
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" name="passconf" id="p2"/></td>
</tr>
                        --->
                        <tr>
                            <td></td>
                            <td><input type="submit" value="change"/></td>

                        </tr>

                    </table>
                    <span><font color="red"><?php
                            if(isset( $_SESSION['ch'])){
                                // echo $_SESSION['ch'];
                                echo "<a href=\"Script/Logout.php\">Relog and continue</a>";
                            }
                            ?></font></span>
                </form>
                <?php
                ?>

                <br /><br /><br /><br />

            </div>
        </div>
        <div id="bottom">
        </div>

    </body>
</html>


