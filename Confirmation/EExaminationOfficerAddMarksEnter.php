<?php
session_start();
require_once("../class/ExcellReader/Excel/reader.php");
require_once("../class/ExcellDataManager.php");
require_once("../class/Examination.php");
require_once("../class/StExam.php");
require_once("../class/Mark.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
  Date Saving Operation carried out......<br/>
        <?php
        $elman=unserialize($_SESSION['fincon']);
       // print_r($elman);
        $error=$elman->Error;

        if($error){
           // print_r($elman);
            echo "Save Unsuccessfull Due to following errors<br/> <b>Please Correct the errors and resubmit</b><br/>";
            if(is_array($error)){
                foreach($error as $err){
                    if(is_array($err)){
                        foreach($err as $er){
                            echo "$er<br/>";
                        }
                    }else{
                    echo "$err<br/>";
                }
                }
            }else{
                print_r($error);
            }

          //  print_r($error);
        }
        else{
            echo "operation Succeeded";
        }
        ?>
        <a href="../ExaminationOfficer.php">OK</a>
    </body>
</html>
