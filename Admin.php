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
        <title>Admin-Home</title>
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
                text-shadow:#0066FF;
            }
            .style1 {
                font-size: 10pt;
                color: #000099;
            }
            #apDiv4 {
                position:absolute;
                width:108px;
                height:109px;
                z-index:4;
                left: 371px;
                top: 203px;
            }
            #apDiv5 {
                position:absolute;
                width:111px;
                height:116px;
                z-index:5;
                left: 554px;
                top: 322px;
            }
            #apDiv6 {
                position:absolute;
                width:114px;
                height:115px;
                z-index:6;
                left: 734px;
                top: 193px;
            }
            #apDiv7 {
                position:absolute;
                width:109px;
                height:108px;
                z-index:7;
                left: 327px;
                top: 382px;
            }
            #apDiv8 {
                position:absolute;
                width:96px;
                height:98px;
                z-index:8;
                left: 556px;
                top: 486px;
            }
            #apDiv9 {
                position:absolute;
                width:117px;
                height:115px;
                z-index:9;
                left: 767px;
                top: 386px;
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
                    <br />


                    <div id="apDiv5"><strong>Reports</strong><a href="AdminReports.php"><img src="images/admin/reports.gif" alt="reports" width="111" height="98" /></a></div>
                    <p>&nbsp;</p>
                    <div id="apDiv6"><strong>Add new active course</strong><a href="AdminAddnewActiveCourse.php"><img src="images/admin/add-new-active-course.gif" alt="anac" width="116" height="90" /></a></div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <div id="apDiv8"><strong>Add new course</strong><a href="AdminAddNewCourseA.php"><img src="images/admin/add-course.gif" alt="anc" width="97" height="76" /></a></div>
                    <p>&nbsp;</p>
                    <div id="apDiv7"><strong>Close active course</strong><a href="AdminCloseActiveCourse.php"><img src="images/admin/close-new-active-course.gif" alt="cac" width="100" height="85" /></a></div>
                    <div id="apDiv9"><strong>Change password</strong><a href="ChangePassword.php"><img src="images/admin/passwords.gif" alt="pswrd" width="113" height="92" /></a></div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><br />
                    </p>
                    <div id="apDiv4"><strong>Add user</strong><a href="AdminAddUser.php"><img src="images/admin/user.gif" alt="user" width="108" height="95" /></a></div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><br />
                        <br />
                        <br />


                    </p>
                </div>
            </div>
            <div id="bottom">
            </div>
        </div>
    </body>
</html>


