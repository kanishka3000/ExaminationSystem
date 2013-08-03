<?php

session_start();
require_once("../class/Student.php");
if(isset($_GET['RegistrationId'])){
    $RegistrationNo=$_GET['RegistrationId'];
    $stu=new Student();
    $stu= $stu->studentExist($RegistrationNo);
    // print_r($stu);
    if($stu!=false){
        $stu->setCourses();
        $_SESSION['student']=serialize($stu);
        $stuCour=$stu->getCourses();
        header("Content-type:text/xml");
        echo '<?xml version="1.0" ?>';
        echo "<courses>";
        foreach($stuCour as $stc){
            echo "<course>$stc->Ac_id</course>";
        }
        echo "</courses>";
    }else{

    }

}else{
    if(isset($_GET['CourseId'])){
        $cours=$_GET['CourseId'];
        $st=unserialize($_SESSION['student']);
        $stuCour=$st->getCourses();
        //edit to return subjects which have an Examination;
        //c_id available
        $cor=$stuCour["$cours"];
        //        $cor->setSubjects();

        //        $subs=$cor->getSubjects();
        #
        $subs=$cor->getExamSubjects($cours);
        $_SESSION['Course']=serialize($cor);


        #



        header("Content-type:text/xml");
        echo '<?xml version="1.0" ?>';
        echo "<subjects>";
        foreach($subs as $stc){
            echo "<subject>$stc->Sub_id</subject>";
        }
        echo "</subjects>";
    }
    else{



        $stu=unserialize($_SESSION['student']);
        $subjects=$_GET;
        $corse=unserialize($_SESSION['Course']);
        $subs=$corse->getSubjects();
        // print_r($subs);
        foreach($subs as $sub){
            $subn=$sub->Sub_id;
            if(isset($_REQUEST[$subn])){
                $sub->applyForExam($stu->RegistrationNo);
            }
        }
        $_SESSION['exNote']=serialize($subs);



        // not saving complete it;
        //        foreach($subjects as $key=>$value){
        //            foreach($subs as $co){
        //              //  print_r($co);
        //               // echo $key."</br>";
        //               if($key==$co->Sub_id){
        //                   $co->applyForExam($stu->RegistrationNo);
        //                   //echo $co->SubjectName;
        //
        //               }
        //            }
        //        }
        //        print_r($_REQUEST);

        //   print_r($subjects);
        header("location:../Confirmation/ExaminationOfficerRegisterStudent.php");
    }
}
?>
