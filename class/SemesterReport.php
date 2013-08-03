<?php
/**
 * Description of SemesterReport
 *
 * @author Kanishka
 */
require_once("ExaminationOfficerReport.php");
require_once("Connection.php");
class SemesterReport extends ExaminationOfficerReport{
    public $Students;
    public $Ac_id;#layer1
    public $Year;
    public $Semester;

    public $ExaStudents;#layer 2;

    public $Sub_id;
    public $SubName;#layaer 3;

    public function setData($Students,$Ac_id,$Year,$Semester){
        //$this->Students=$Students;
        if(is_array($Students)){
            $tempStudent;
            //$ExaStudents;
            foreach($Students as $Student){
                $eStudent=new SemesterReport();
                $eStudent->RegistrationId=$Student->RegistrationNo;
               $eStudent->Indexid=$Student->IndexNo;

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
       
       $query="select * from Subject right join Exam on Subject.Sub_id=Exam.Sub_id  right join Mark on Exam.Exam_id=Mark.Examid where Exam.Exa_id in (select Exa_id from examination where C_id=(select C_id from activecourse where Ac_id='$this->Ac_id' )and year='$this->Year' and Semester='$this->Semester') and Mark.RegistrationId='$this->RegistrationId' and Mark.Attended='T'";
      // echo $query;
        $result=Connection::connect($query);
        $rep;

        while($row=mysql_fetch_array($result)){
            $re=new SemesterReport();
            $re->RegistrationId=$row['RegistrationId'];
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            $re->SubName=$row['SubjectName'];
            // $re->ExamName=$row['ExamName'];
            $re->Markid=$row['Markid'];
            $re->AssignmentPercentage=$row['AssignmentPercentage'];
            $re->AttendancePercentage=$row['AttendancePercentage'];
            $re->Paper=$row['Paper'];
            $re->PaperEdit=$row['PaperEdit'];
            $re->shy=$row['Shy'];
            $re->Assignment=$row['Assignment'];
            $re->Attendance=$row['Attendance'];
            $re->Afrom=$row['Afrom'];
            $re->Bfrom=$row['Bfrom'];
            $re->Cfrom=$row['Cfrom'];
            $re->Dfrom=$row['Dfrom'];
            $re->Sub_id=$row['Sub_id'];
            $Mkid=$row['Markid'];
            $re->setRank();
            $this->Total=+$re->Mark;
            $this->count++;
            //$this->count++;
            //$this->Total=($this->Total)+($re->Mark);
            $rep[$Mkid]=$re;
        }
        $this->ExaStudents=$rep;


    }
    public function standerlizeData(){
        #code to remove repeatings and absenties and faiures;

        if(is_array($this->ExaStudents)){
            ksort($this->ExaStudents);
            $mkinsub;
            foreach($this->ExaStudents as $Mark){
                $mkinsub[$Mark->Sub_id]=$Mark;
            }
            $this->Total=0;
            $this->Average=0;
            $this->count=0;
            foreach($mkinsub as $mksi){
                $this->Total+=$mksi->Mark;
                $this->count++;

            }
            if($this->count!=0){
                $this->Average=($this->Total)/$this->count;
            }

            $this->ExaStudents=$mkinsub;
        }
    }



}
?>
