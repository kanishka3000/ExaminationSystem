<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExaminationOfficerTranscriptSemester
 *
 * @author kanishka
 */
//require_once("ExaminationOfficerTranscript.php");
class ExaminationOfficerTranscriptSemester extends ExaminationOfficerTranscript{
    public function setData($Students,$Ac_id,$Year,$Semester){
        //$this->Students=$Students;
        if(is_array($Students)){
            $tempStudent;
            //$ExaStudents;
            foreach($Students as $Student){
                $eStudent=new ExaminationOfficerTranscriptSemester();
                $eStudent->RegistrationId=$Student->RegistrationNo;
                $eStudent->Indexid=$Student->IndexNo;
                $eStudent->Name=$Student->Name;
                $eStudent->Ac_id=$Ac_id;
                $eStudent->Year=$Year;
                $eStudent->Semester=$Semester;
                $eStudent->internalData();
                if(!($this->TotalData)){
                    $eStudent->sortData();
                }else{
                    $eStudent->standerlizeData();
                }
                $tempStudent[]=$eStudent;
            }
            $this->Students=$tempStudent;
        }else{
            $this->Students=false;
        }
    }

    public function internalData(){
        // $query="select * from Subject right join Exam on Subject.Sub_id=Exam.Sub_id  right join Mark on Exam.Exam_id=Mark.Examid where Exam.Exa_id in (select Exa_id from examination where C_id=(select C_id from activecourse where Ac_id='$this->Ac_id' )and year='$this->Year') and Mark.RegistrationId='$this->RegistrationId' and Mark.Attended='T'";
        //  echo $query;
        $query="select * from Subject right join Exam on Subject.Sub_id=Exam.Sub_id right join Mark on Exam.Exam_id=Mark.Examid left join Examination on Exam.Exa_id=Examination.Exa_id where Examination.C_id=(select C_id from activecourse where Ac_id='$this->Ac_id' )  and Mark.RegistrationId='$this->RegistrationId' and Mark.Attended='T'";
        //        echo $query;
        $result=Connection::connect($query);
        $rep;

        while($row=mysql_fetch_array($result)){
            $re=new ExaminationOfficerTranscriptSemester();
            $re->RegistrationId=$row['RegistrationId'];
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            $re->SubName=$row['SubjectName'];
            $re->Semester=$row['Semester'];
            $re->Year=$row['year'];
            // $re->ExamName=$row['ExamName'];
            $re->Markid=$row['Markid'];
            $re->AssignmentPercentage=$row['AssignmentPercentage'];
            $re->AttendancePercentage=$row['AttendancePercentage'];
            $re->Paper=$row['Paper'];
            $re->Assignment=$row['Assignment'];
            $re->Attendance=$row['Attendance'];
            $re->Afrom=$row['Afrom'];
            $re->Bfrom=$row['Bfrom'];
            $re->Cfrom=$row['Cfrom'];
            $re->Dfrom=$row['Dfrom'];
            $re->Sub_id=$row['Sub_id'];
            $Mkid=$row['Markid'];
            $re->setRank();
            //$this->count++;
            //$this->Total=($this->Total)+($re->Mark);
            $rep[$Mkid]=$re;
        }
        $this->ExaStudents=$rep;

    }



    public function standerlizeData(){
        //update to sort and set accrding to the semester and years;

        if(is_array($this->ExaStudents)){
            ksort($this->ExaStudents);
            $mkinsub;
            foreach($this->ExaStudents as $Mark){
                $mkinsub[$Mark->Sub_id]=$Mark;
            }
            $this->ExaStudents=$mkinsub;
        }



        if(is_array($this->ExaStudents)){

            $mkinsub2;



            foreach($this->ExaStudents as $Mark){
                //    $mkinsub[$Mark->Sub_id]=$Mark;
                $mkinsub2[$Mark->Year][$Mark->Semester][]=$Mark;
                //three dimensional array

            }
            $this->ExaStudents=$mkinsub2;
        }
    }




}
?>
