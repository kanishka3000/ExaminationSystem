<?php
require("class/Course.php");
session_start();
$cos=new Course();
$courses=$cos->getAllActiveCourses();
$_SESSION['Courses']=serialize($courses);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Examination System:Officer</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="Style/default2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="sidebar">
	<div id="logo">
		<h1><a href="#">IHRA Exam </a></h1>
		<h2><a href="http://www.ucsc.cmb.ac.lk"></a></h2>
	</div>
	<div id="menu" class="boxed">
		<div class="content">
			<ul>
				<li class="active"><a href="Officer.php" title="">Home</a></li>
				<li>
                <form action="OfficerMarkAttendance.php"><select type="text" name="course">
      <?php
      if(is_array($courses)){
      foreach($courses as $co){
          echo "<option>$co->Ac_id</option>";
      }
      }

      ?>
      </select><br />
      <input type="submit" value="mark Attendance"></form>  </li>
				<li><a href="OfficerUpdateStudentInfo.php" title="">Update Student Information</a></li>
				<li><a href="OfficerNotifications.php" title="">Notifications</a></li>
				<li><a href="ChangePassword.php" title="">Password&Settings</a></li>
				<li><a href="Script/Logout.php" title="">Logout</a></li>
			</ul>
		</div>
	</div>

	    <div id="updates" class="boxed">
        <h2 class="title">Recent Updates</h2>
        <div class="content">
            <ul>
                <?php

                include_once('class/News.php');
                $news=new News();
                if(isset($_SESSION['news'])){
                    $new=unserialize($_SESSION['news']);
                }
                else{
                    $new=$news->setNewsItems();
                    $_SESSION['news']=serialize($new);
                }


                if(is_array($new)){
                    foreach($new as $ne){
                        echo "<li>";
                        echo "<h3>$ne->Date</h3>";
                        echo "<p><u>$ne->Item</u></p>";
                        echo "</li>";

                    }
                }
                else{
                    echo "<li>";
                    echo "no news added by the adminstrator";
                    echo "</li>";
                }
                ?>


            </ul>
        </div>
    </div>
</div>


<div id="main">
	<div id="welcome" class="post">
		<h2 class="title">Examination System</h2>
	
		<div class="meta">
			<p>Examination System was developed by <a href="index.php">2007ict Batch</a><br />
				<a href="#">please visit ucsc site for information</a> | <a href="ucsc.cmb.ac.lk">UCSC</a> | <a href="www.ucsclodge.lk">UCSC lodge</a></p>
		</div>
	  <div class="story">
	    <p>&nbsp;</p>
        <form action="Script/OfficerUpdateStudentInfopage.php">
        Enter the Registration id:
        <input type="text" name="RegistrationId" />
        <input type="submit" value="Enter" name="Enter">

        </form>
	  </div>
	</div>
	<div id="example" class="post">
		<h2 class="title">&nbsp;</h2>

  </div>
</div>
 <div id="footer">
            <p id="legal">Copyright &copy; 2008 IHRA Examination Department. All Rights Reserved. </p>
            <p id="links"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
        </div>
</body>
</html>
