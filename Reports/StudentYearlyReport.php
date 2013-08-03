<?php
require_once("../class/Connection.php");
require_once("../class/Subject.php");
require_once("../class/ExaminationOfficerReport.php");
if(isset($_POST['course'])){
    $C_id=$_POST['course'];
    $RegistrationId=$_POST['registrationid'];
    $Year=$_POST['year'];
    $Rep=new ExaminationOfficerReport();
    $R= $Rep->setStudentYearlyEductionInformation($RegistrationId, $C_id, $Year);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Examination System:Report</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="../Style/default2.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="sidebar">
            <div id="logo">
                <h1><a href="#">UCSC Exam </a></h1>
                <h2><a href="http://www.ucsc.cmb.ac.lk"></a></h2>
            </div>


            <div id="updates" class="boxed">
                <h2 class="title">Recent Updates</h2>
                <div class="content">
                    <ul>
                        <?php

                        include_once('../class/News.php');
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
                <h3 class="date"><span class="month">Mar.</span> <span class="day">8</span><span class="year">, 2007</span></h3>
                <div class="meta">
                    <p>Examination System was developed by <a href="index.php">2007ict Batch</a><br />
                    <a href="#">please visit ucsc site for information</a> | <a href="ucsc.cmb.ac.lk">UCSC</a> | <a href="www.ucsclodge.lk">UCSC lodge</a></p>
                </div>
                <div class="story">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <?php
                    //print_r($R);
                    echo "Registration Identification:".$student."<br />";
                    if(is_array($R)){
                        foreach($R as $r){
                            echo "The Exam is:$r->ExamId and the Subject is:$r->Sub_id<br />";
                            echo "Marks separately for paper is:$r->Paper and Marks for Assignment:$r->Assignment<br />";
                            echo "The percentage for assignment is:$r->AssignmentPercentage%<br/>";
                            echo "Total for the Exam is<b>:$r->Mark</b><br />";
                            echo "The student Rank is:$r->Rank<br />";
                            echo "<hr/>";
                        }
                        echo "<hr/>";
                        echo "The total of the above is:".$Rep->getTotal()."<br/>";

                        echo "The Average of the above is :".$Rep->getAverage()."<br/>";
                    }else{
                        echo "<font color=red>This student does not exist<br/> or the exam information is unavailable </font>";
                    }

                    ?>
                    <p>&nbsp;</p>
                </div>
            </div>
            <div id="example" class="post">
                <h2 class="title">&nbsp;</h2>

            </div>
        </div>
        <div id="footer">
            <p id="legal">Copyright &copy; 2007 ucsc Examination Department. All Rights Reserved. </p>
            <p id="links"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
        </div>
    </body>
</html>
