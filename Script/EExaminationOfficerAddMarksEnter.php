<?php
session_start();
require_once("../class/ExcellReader/Excel/reader.php");
require_once("../class/ExcellDataManager.php");
require_once("../class/Examination.php");
require_once("../class/StExam.php");
require_once("../class/Mark.php");

if(isset($_FILES['ExcellSheet'])){
    $xl_reader = new Spreadsheet_Excel_Reader();
    $xl_reader->setOutputEncoding('CP1251');
    $file=$_FILES['ExcellSheet'];
    $fname=$file['name'];
    $fcname=$file['tmp_name'];
    $arr=explode(".", $fname);
    $finame=$arr[0];
    $ext=$arr[1];
    //echo $finame;

    $examination=Examination::getExamination($finame);
    if($examination->Active=="T" || $ext=="xls"){
        $xl_reader->read("$fcname");
        $elman=new ExcellDataManager();
        $elman->setSubject($examination);
        $xld=$elman->Subjects;
        // print_r($xld);
        #mapping the sheets with the sheet nos
        $mapper;
        for($j=0;$j<sizeof($xl_reader->sheets);$j++){
            $sh=$xl_reader->boundsheets[$j];
            $mpname=$sh['name'];
            $mapper[$mpname]=$j;
        }
        #mapper available;
        //  print_r($mapper);
        $i=0;
        foreach($xld as $subject){
            //print_r($subject);
            $exams=$subject->Marks;
            $subid=$subject->Sub_id;
            if(isset($mapper[$subid])){
                $subject->check="T";
            }
            $pgno=$mapper[$subid];
            $currsheet=$xl_reader->sheets[$pgno];
            //        echo $subid;
            //        print_r($currsheet);
            //        echo "<br/> <br/>";

            for($i=0;$i<($currsheet['numRows']-5);$i++){
                //print_r($currsheet);
                $k=0;
                $k=$i+6;
                //   echo $k;
                $regid= $currsheet['cells'][$k][1];
                $papmk=$currsheet['cells'][$k][6];
                $assmk=$currsheet['cells'][$k][7];
                $attmk=$currsheet['cells'][$k][8];
                #each students assignment marks,paper marks,attendance marks available;

                $mark=$exams[$regid];
                $mark->Paper=$papmk;
                $mark->Assignment=$assmk;
                $mark->AttendanceMk=$attmk;
                $mark->checkIt="T";
                //echo "$regid, $papmk,$assmk,$attmk";

                // echo "<br />";
            }
            // $i++;
        }
        //print_r($elman);
        $che=$elman->validateData();
        if($elman->Error){
            // echo "error:please abort";
        }else{
            $elman->saveData();
            $examination->closeExamination();
        }



        //print_r($elman->Error);

        // print_r($marks);
        $_SESSION['fincon']=serialize($elman);

        header("location:../Confirmation/EExaminationOfficerAddMarksEnter.php");

    }else{
        $elman=new ExcellDataManager();
        $elman->Error[]="Invalid Operation, no such empty examination found/not a valid xls file";
        $_SESSION['fincon']=serialize($elman);


        header("location:../Confirmation/EExaminationOfficerAddMarksEnter.php");
    }

}



?>
