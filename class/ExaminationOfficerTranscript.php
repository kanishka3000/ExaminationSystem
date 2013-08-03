<?php
/**
 * Description of ExaminationOfficerTranscript
 *Data holder class for the examination officer transcript
 * @author Kanishka
 */
require_once("Course.php");
require_once("Connection.php");
require_once("ExaminationOfficerReport.php");
require_once("YearlyReport.php");
class ExaminationOfficerTranscript extends YearlyReport{
    public $Students;#layer 1

    public $Registrationid;#layer 2
    public $Name;
    public $Courseid;
    public $CourseName;

    public $Marks;#layaer 3

    public $SubName;

    #late
    public $Year;
    public $Sems;
    public $TotalData=false;

    public function setTranscript(Course $course){
        $Ac_id=$course->Ac_id;
        $query="select mark.registrationid,student.StudentName,register.IndexNo from mark left join Student on mark.registrationid=Student.registrationid left join register on mark.registrationid=register.RegistrationId and register.Ac_id='$Ac_id' where mark.registrationid in (select registrationid from register where Ac_id='$Ac_id') group by registrationid";
        //$query="select mark.registrationid,student.StudentName,IndexNo from mark left join Student on mark.registrationid=Student.registrationid left join register on mark.registrationid=register.RegistrationId and register.Ac_id='$Ac_id' where register.Ac_id";
        //echo $query;
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            while($row=mysql_fetch_array($result)){
                $student=new ExaminationOfficerTranscript();
                $streg=$row['registrationid'];
                $student->Registrationid=$streg;
                $student->Name=$row['StudentName'];
                $student->Indexid=$row['IndexNo'];
                $student->CourseName=$course->CourseName;
                $student->Courseid=$course->C_id;
                $student->setStudentData();
                $this->Students[$streg]=$student;
            }
        }

    }
    public function setStudentData(){
        $query="select * from mark left join exam on mark.Examid=exam.Exam_id  left join subject on Exam.Sub_id=Subject.Sub_id where RegistrationId='$this->Registrationid' and Mark.Empty='F' and Mark.Attended='T'";
        // $query="select * from Mark left join exam on mark.Examid=exam.Exam_id where mark.Empty='F' and mark.RegistrationId='$RegistrationId' and exam.Sub_id in(select Sub_id from subject where C_id in(select C_id from Activecourse where Ac_id='$C_id')) ";
        #there is no single primary key
        $result=Connection::connect($query);
        $rep;
        //echo $query;
        while($row=mysql_fetch_array($result)){
            $re=new ExaminationOfficerTranscript();
            $re->RegistrationId=$row['RegistrationId'];
            $re->Indexid=$this->Indexid;
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            $re->SubName=$row['SubjectName'];
            $re->Year=$row['year'];
            $re->Sems=$row['semester'];
            // $re->ExamName=$row['ExamName'];
            $re->Markid=$row['Markid'];
            $re->AssignmentPercentage=$row['AssignmentPercentage'];
            $re->Paper=$row['Paper'];
            $re->Assignment=$row['Assignment'];
            $re->Afrom=$row['Afrom'];
            $re->Bfrom=$row['Bfrom'];
            $re->Cfrom=$row['Cfrom'];
            $re->Dfrom=$row['Dfrom'];

            $re->PaperEdit=$row['PaperEdit'];
            $re->setRank();
            $this->count++;
            $this->Total=($this->Total)+($re->Mark);
            $this->Marks[]=$re;
            $rep[]=$re;
        }
        if($this->count!=0){
            $this->Average=$this->Total/$this->count;
        }
        else{
            $this->Average=0;
        }
        if(Connection::$affectedrows!=0){
            // $this->Marks=$rep;
        }
        else{

        }

    }
    public function setData($Students,$Ac_id,$Year,$Semester){
        //$this->Students=$Students;
        if(is_array($Students)){
            $tempStudent;
            //$ExaStudents;
            foreach($Students as $Student){
                $eStudent=new ExaminationOfficerTranscript();
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
            $re=new ExaminationOfficerTranscript();
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
            //$this->count++;
            //$this->Total=($this->Total)+($re->Mark);
            $rep[$Mkid]=$re;
        }
        $this->ExaStudents=$rep;

    }
    public function standerlizeData(){
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
                $mkinsub2[$Mark->Year][]=$Mark;


            }
            $this->ExaStudents=$mkinsub2;
        }



    }
    public function sortData(){
        if(is_array($this->ExaStudents)){

            $mkinsub2;



            foreach($this->ExaStudents as $Mark){
                //    $mkinsub[$Mark->Sub_id]=$Mark;
                $mkinsub2[$Mark->Year][]=$Mark;


            }
            $this->ExaStudents=$mkinsub2;
        }
    }

}
?>
