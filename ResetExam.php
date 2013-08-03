<?php
session_start();
if($_SESSION['LOG']!='A'){
    header("location:index.php");
}
require_once("class/Examination.php");
$ex=new Examination();
$exams=$ex->getAllUnupdateExaminations();
$_SESSION['exas']=serialize($exams);


?>


<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Examination Officer MarksHack</title>
    </head>
    <body>
    Please select an examination to Reset<br/>
<b>Note that this process is against rules and reguations and will be reported </b>
<br/><form action="Script/ResetExam.php" method="POST">

<select name="Examid">
<?php
        if(is_array($exams)){
            foreach($exams as $exam){
               echo "<option>$exam->Exa_id</option>";
            }


        }
        ?>
        </select>
        <input type="submit" value="Go" />
        </form>
    </body>
</html>
