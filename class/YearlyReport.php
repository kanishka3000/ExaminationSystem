<?php
/**
 * Description of YearlyReport
 *
 * @author Kanishka
 */
require_once("SemesterReport.php");
class YearlyReport extends SemesterReport{
    public $Semester;
     public function setData($Students,$Ac_id,$Year,$Semester){
        //$this->Students=$Students;
        if(is_array($Students)){
            $tempStudent;
            //$ExaStudents;
            foreach($Students as $Student){
                $eStudent=new YearlyReport();
                $eStudent->RegistrationId=$Student->RegistrationNo;
                $eStudent->Name=$Student->Name;
                $eStudent->Ac_id=$Ac_id;
                $eStudent->Year=$Year;
                $eStudent->Semester=$Semester;
                $eStudent->internalData();
                $eStudent->standerlizeData();
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
        $query="select * from Subject right join Exam on Subject.Sub_id=Exam.Sub_id right join Mark on Exam.Exam_id=Mark.Examid left join Examination on Exam.Exa_id=Examination.Exa_id where Examination.C_id=(select C_id from activecourse where Ac_id='$this->Ac_id' ) and Examination.year='$this->Year' and Mark.RegistrationId='$this->RegistrationId' and Mark.Attended='T'";
//        echo $query;
        $result=Connection::connect($query);
        $rep;

        while($row=mysql_fetch_array($result)){
            $re=new YearlyReport();
            $re->RegistrationId=$row['RegistrationId'];
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            $re->SubName=$row['SubjectName'];
            $re->Semester=$row['Semester'];
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
         parent::standerlizeData();
          if(is_array($this->ExaStudents)){
          #separate in to the semesters;
           $tempmarks;
            foreach($this->ExaStudents as $Mark){
                $se=$Mark->Semester;
                $tempmarks[$se][$Mark->Sub_id]=$Mark;
            }
            $this->ExaStudents=$tempmarks;
        }
     }
}
?>
