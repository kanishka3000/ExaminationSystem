<?php
session_start();
require_once("../class/Examination.php");
require_once("../class/ExcellDataManager.php");
require_once("../class/Spreadsheet_Excel_Writer-0.9.1/Writer.php");
if(isset($_REQUEST['Exam'])){
    $Exa_id=$_REQUEST['Exam'];

    $examinations=unserialize($_SESSION['Examinations']);
    $examination=$examinations[$Exa_id];
    $_SESSION['examin']=serialize($examination);
    //print_r($examination);
    //  $exm=new Exam();
    //  $ms=$exm->getMarksForExamination($Exa_id);
    //    print_r($ms);
    $elman=new ExcellDataManager();
    $elman->setSubject($examination);
    $name="$examination->Exa_id.xls";
    // now use the ExacellWriter to genarage separate sheet for separate EcellDatamanage object created for separate subject
    $excel=new Spreadsheet_Excel_Writer($name);
    $subjects=$elman->Subjects;

    foreach($subjects as $subject){
        $suname=$subject->Sub_id;
        //echo $suname;
        $sheet =& $excel->addWorksheet($suname);
        $marks=$subject->Marks;
        $titleText = "$examination->ExaminationName";
        $titleFormat =& $excel->addFormat();
        $titleFormat->setFontFamily('verdana');
        $titleFormat->setBold();
        $titleFormat->setSize('16');
        $titleFormat->setColor('black');

        // Set the bottom border width to "thick"
        //$titleFormat->setBottom(2);
        //
        //// Set the color of the bottom border
        //$titleFormat->setBottomColor('black');

        // Set the alignment to the special merge value
        $titleFormat->setAlign('merge');
        $HeadFormat=& $excel->addFormat();
        $HeadFormat->setFontFamily('verdana');
        $HeadFormat->setSize('12');
        //  $HeadFormat->setAlign('merge');


        $sheet->write(1,4,$titleText,$titleFormat);

        $sheet->write(4,0,"Registration No:",$HeadFormat);
        $sheet->write(4,1,"Name",$HeadFormat);
        $sheet->write(4,2,"Marking 1",$HeadFormat);
        $sheet->write(4,3,"Marking 2",$HeadFormat);
        $sheet->write(4,4,"Marking 3(if available)",$HeadFormat);
        $sheet->write(4,5,"Average",$HeadFormat);
        $sheet->write(4,6,"Assignemnt Marks",$HeadFormat);
        $sheet->write(4,7,"Attendance Marks",$HeadFormat);
        $sheet->write(4,8,"student attempt",$HeadFormat);
         $sheet->write(4,9,"Index No",$HeadFormat);
        #not reading the actual file
        $subFormat=& $excel->addFormat();
        $subFormat->setFontFamily('verdana');
        $subFormat->setSize('14');
        $subFormat->setAlign('merge');
        $sheet->write(2,4,"$subject->SubjectName",$subFormat);
        $i=5;
        if(is_array($marks)){
            foreach($marks as $mark){
                $Reid=$mark->RegistrationNo;
                $Rename=$mark->StudentName;
                $shshy=$mark->Shy;
                $shindes=$mark->IndexNo;
                $sheet->write($i,0,"$Reid");
                $sheet->write($i,1,"$Rename");
                //    $sheet->write($i,2,"0");
                //            $sheet->write($i,3,"0");
                //            $sheet->write($i,4,"0");
                //            $sheet->write($i,5,"0");
                $sheet->write($i,6,"0");
                $sheet->write($i,7,"0");
                $sheet->write($i,8,"$shshy");
                   $sheet->write($i,9,"$shindes");
                //row,colomn,value
                $i++;
            }
        }
    }
   
  //  print_r($elman);
    if ($excel->close() === true) {
        //echo 'Spreadsheet successfully saved!';
        //echo "download it at:<a href=\"$name\" >download</a>";
        $_SESSION['xlfile']=$name;
        //echo "clan file <input type=\"button\" onclick=\"cleanme()\">";
    } else {
        $elman->FError[]="Error During Save process";
       // echo 'ERROR: Could not save spreadsheet.';
    }
     $_SESSION['elman']=serialize($elman);
    header("location:../Confirmation/EExaminationOfficerAddMarks.php");
    
    
}

?>
