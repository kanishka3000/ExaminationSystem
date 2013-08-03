<?php
session_start();
if(!isset($_SESSION['LOG'])){
    header("location:index.php");
}

require("class/Exam.php");

if(isset($_POST['SelExamCombo'])){
    $examid=$_POST['SelExamCombo'];
    // echo "selected exam is:".$examid;
    $exams=unserialize($_SESSION['Exam']);
    $exam=$exams["$examid"];
    //   print_r($exam);
    $exam->setMarks();
    $_SESSION['Exam1']=serialize($exam);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Examination Officer:Add Marks</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="Style/default2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="javascript/validate.js"></script>
        <script type="text/javascript" language="javascript">
            function checkInt(e){
                // alert('hi')
                if (window.event) e = window.event;
                var srcEl = e.srcelement? e.srcelement : e.target;
                //var srcE=parseInt(srcEl.value);
                //alert(srcE.value);
                //alert(typeof(srcE))
                if(!(srcEl.value=="")){
                    if(IsNumeric(srcEl.value)){
                        var val=parseInt(srcEl.value);
                        if(val>100){
                            alert("can't give more than 100?");
                            srcEl.focus();
                        }
                    }
                    else{
                        alert('Not a number');
                        srcEl.focus();
                    }
                }
                else{
                    alert('The field cant be kept empty');
                    srcEl.focus();
                }
            }
            function IsNumeric(sText){
                var ValidChars = "0123456789";
                var IsNumber=true;
                var Char;
                for (i = 0; i < sText.length && IsNumber == true; i++)
                {
                    Char = sText.charAt(i);
                    if (ValidChars.indexOf(Char) == -1)
                    {
                        IsNumber = false;
                    }
                }
                return IsNumber;
            }
        </script>

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
                        <li class="active"><a href="ExaminationOfficer.php" title="">HOME</a></li>
                        <li><a href="ExaminationOfficerAddnewExam.php" title="">Add New Exam</a></li>
                        <li><a href="ExaminationOfficerRegisterStudent.php" title="">Register For Exam</a></li>
                        <li><span ><b>Add Marks</b></span>
                            <form action="ExaminationOfficerAddMarks.php" method="post" name="form2" class="style3" id="form2">

                                <span class="style3">

                                </span>                              <br />
                                <select name="SelExamCombo" id="SelExamCombo">
                                    <?php
                                    $exa=new Exam();
                                    $exams=unserialize($_SESSION['Exam']);
                                    foreach($exams as $e){
                                        echo "<option>";
                                        echo $e->Examid;
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                                <br />
                                <input type="submit" value="select">
                            </form>

                        </li>
                        <li><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a></li>
                        <li><a href="ExaminationOfficerReports.php" title="">Reports</a></li>
                        <li><a href="ExaminationOfficerResetAttempt.php" title="">Reset Attempt</a></li>
                        <li><a href="ChangePassword.php" title="">PassWord&Settings</a></li>
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
                    <div align="center">
                        <form id="form1" name="form1" method="post" action="Script/ExaminationOfficerAddMarks.php" onsubmit="return checkText()">
                            <table width="70%" border="1" cellspacing="10">
                                <tr>
                                    <td><h3 align="center">Student id </h3></td>
                                    <td><h3 align="center">Marks (Paper)</h3></td>
                                    <td><h3 align="center">Marks</h3>
                                    <h3 align="center">(Assignment)</h3></td>
                                    <td><h3 align="center">Absent</h3></td>
                                </tr>
                                <?php
                                $Marks=$exam->getMarkElements();
                                if($Marks){
                                    foreach($Marks as $ma){

                                        echo "<tr>";
                                        echo "<td>$ma->RegistrationNo</td>";
                                        echo "<td><input type=\"text\" name=\"$ma->RegistrationNo-Pa\" onblur=\"checkInt(event)\"></td>";
                                        echo "<td><input type=\"text\" name=\"$ma->RegistrationNo-As\"onblur=\"checkInt(event)\"></td>";
                                         echo "<td><input type=\"checkbox\" name=\"absent\"></td>";
                                        echo "</tr>";

                                    }
                                }
                                else{

                                    echo "<font color=\"red\">The exam selected does not contain any empty fields<br/><b> No results</b></font> ";
                                }

                                ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>



                            </table>
                            <p>
                                <input type="submit" name="Save" id="Save" value="Save" />
                            </p>
                        </form>
                    </div>
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
