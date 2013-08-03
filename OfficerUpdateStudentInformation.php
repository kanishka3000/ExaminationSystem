<?php
session_start();
if($_SESSION['LOG']!='R'){
    header("location:index.php");
}
require_once("class/Student.php");
require_once("class/Course.php");
$couse=new Course();
//$activeCoruses=$couse->getAllActiveCourses();
//$_SESSION['activecourse']=serialize($activeCoruses);
$name=$_SESSION['regn'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>RegOfficer-Update student info</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style2.css" />
        <script language="javascript" src="javascript/OfficerUpdateStudentInformation.js"></script>
        <script language="javascript" src="javascript/Ajax.js"></script>
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
              <p align="justify"><strong> Welcome</strong>: Registration officer<?php echo $name?> </p>
          </div>
          
            <br/>
          <br />
                <ul>
                    <li ><a href="RegistrationOfficer.php" title="">Home</a></li>
                        <li><a href="RegistrationOfficerRegisterStudent.php">Register Student</a></li>
                        <li><a href="RegistrationOfferRegisterCourse.php" title="">Register Student for course</a></li>
                        <li><a href="OfficerUpdateStudentInformation.php" title="">Update Student Information</a></li>
                        <li><a href="Script/Logout.php" title="">Logout</a></li>
                    <li ></li>
                  </ul>
              </div>
                <div id="stuff">
                <br /><br /><br /><br /><br /><br /><br />
                    <?php
                    if(isset($_SESSION['sterror'])){
                        echo "<b>The student was unspecified please set</b><br/>";
                    }



                    $student;

                    $student=new Student();
                    echo "Please enter the National Identicard No to register the stuent<br/>";
                    echo "<input type=\"text\" name=\"nid\" id=\"nid\"/>";
                    echo "<input type=\"button\" name=\"ok\" id=\"ok\" value=\"search\" onclick=\"studentExist()\"/>";

                    //print_r($student);
                    echo "<form action=\"Script/OfficerUpdateStudentInformation.php\" method=post>";
                    echo "<input type=hidden name=sav value=ye>";
                    echo "<table>";
                    echo "<tr><td>National Identicard No</td><td><span id=\"nid\">$student->nationalid</span></td></tr>";
                    echo "<tr><td>Name:</td><td><span id=\"name\" onclick=\"maketext(event)\">$student->Name</span></td></tr>";
                    echo "<tr><td>Address:</td><td><span id=\"address\" onclick=\"maketext(event)\">$student->Address</span></td></tr>";
                    echo "<tr><td>secondary Address:</td><td><span id=\"saddress\" onclick=\"maketext(event)\">$student->Address2</span></td></tr>";
                    echo "<tr><td>Telephone</td><td><span id=\"telephone\" onclick=\"maketext(event)\">$student->Telephone</span></td></tr>";
                    echo "<tr><td>Mobile phone No</td><td><span id=\"mobile\" onclick=\"maketext(event)\">$student->Mobile</span></td></tr>";
                    echo "<tr><td>University</td><td><span id=\"university\" onclick=\"maketext(event)\">$student->University</span></td></tr>";
                    echo "<tr><td>Image</td><td><span id=\"image\"> <img id=\"kk\"src=\"$student->Photo\"  width=\"100\" height=\"100\"/></span></td></tr>";
                    echo "</table>";
                    echo "<input type=\"submit\"value=save disabled=disabled id=sa>";
                    echo "</form>";
                    ?>
                    <br/>
                    <div>

                    </div>
                    <div id="res">
                    <form>
                    <input type="hidden" name="edit" id="edit"/>
                    <input type="hidden" name="name" id="name1"/>
                    <input type="hidden" name="address" id="address1"/>
                    <input type="hidden" name="address2" id="address21"/>
                    <input type="hidden" name="telephone" id="telephone1"/>
                    <input type="hidden" name="mobile" id="mobile1"/>
                    <input type="hidden" name="university" id="university1"/>
                    </form>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </div>

                </div>

            </div>



            <div id="bottom">
            </div>
        </div>
    </body>
</html>



