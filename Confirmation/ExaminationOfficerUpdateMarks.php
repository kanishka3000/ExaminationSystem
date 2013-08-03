<?php
session_start();
$xfile=$_SESSION['xlfile'];
$name="../Script/$xfile";
$elman=unserialize($_SESSION['elman']);
$examination=unserialize($_SESSION['examin']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    Data Genarated for the Following Examination:
        <?php
        echo "$examination->Exa_id<br/>";
        ?>
        please make sure that you<b> do not</b> alter the genarated name.<br/>
        Remove any signs genarated by the operating system during temparary file storings<br/>
        Dowload file
        <?php
        if(!$elman->FError){
        echo "<a href=\"$name\" >download</a>";
        }else{
            echo "error:------><br/>";
            print_r($elman->FError);
        }
        ?>
        <br/>
        <b>The temparary file will be cleaned as you leave this page</b><br/>
        <a href="../Script/cleanExcell.php">Ok</a>
    </body>
</html>
<!--New Interface-->
