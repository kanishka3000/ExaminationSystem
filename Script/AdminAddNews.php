<?php

require_once("../class/News.php");
if(isset($_POST['data'])){
    $data=$_POST['data'];
    $new=new News();
    $new->Item=$data;
    $date= date("D, d M Y");
    $new->Date=$date;
    $new->saveNews();
    header("location:../Admin.php");

}
else{
if(isset($_POST['clear'])){
    $new=new News();
    $bool= $new->removeNews();
    if($bool){
        unset($_SESSION['news']);
    }
     header("location:../Admin.php");
}

}

?>
