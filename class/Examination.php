<?php


/**
 * Description of Examination
 *
 * @author Kanishka
 */
require_once("Connection.php");
require_once("Subject.php");
require_once("FileHandle.php");
require_once("Course.php");
class Examination {
    public $Exa_id;
    public $ExaminationName;
    public $TeacherInCharge;
    public $StartDate;
    public $EndDate;
    public $Location;
    public $year;
    public$Semester;
    public $Updateable;
    public $Active;

    public $C_id;

    public $Subjects;
    public $Exams;

    public $Status;
    public static function getExamination($Exa_id){
        $file=new FileHandle();
        $text="Attempt to add marks for $Exa_id";
        $file->setText($text);
        $Examination=new Examination();
        $query="select * from examination where Exa_id='$Exa_id'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $exam;
            while($row=mysql_fetch_array($result)){
                $exam=new Examination();
                $exid=$row['Exa_id'];
                $exam->Exa_id=$exid;
                $exam->ExaminationName=$row['ExaminationName'];
                $exam->Location=$row['Location'];
                $exam->year=$row['year'];
                $exam->StartDate=$row['StartDate'];
                $exam->EndDate=$row['EndDate'];
                $exam->TeacherInCharge=$row['TeacherInCharge'];
                $exam->Semester=$row['Semester'];
                $exam->C_id=$row['C_id'];
                $exam->Updateable=$row['updateable'];
                $exam->Active=$row['Active'];
            }
            return $exam;
        }else{
            return false;
        }
    }

    public function getExaminationToCourse(Course $course,$status){
        $C_id=$course->C_id;
        $query;
        if($status==0){
              $query="select * from examination where C_id='$C_id'";
        }elseif($status==1){
               $query="select * from examination where C_id='$C_id' and Active='T'";
        }elseif($status==2){
            $query="select * from examination where C_id='$C_id' and Active='F' and updateable='T'";
        }
       
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $exams;
            while($row=mysql_fetch_array($result)){
                $exam=new Examination();
                $exid=$row['Exa_id'];
                $exam->Exa_id=$exid;
                $exam->ExaminationName=$row['ExaminationName'];
                $exam->Location=$row['Location'];
                $exam->year=$row['year'];
                $exam->StartDate=$row['StartDate'];
                $exam->EndDate=$row['EndDate'];
                $exam->TeacherInCharge=$row['TeacherInCharge'];
                $exam->Semester=$row['Semester'];
                $exam->C_id=$row['C_id'];
                $exam->Updateable=$row['updateable'];
                $exam->Active=$row['Active'];
                $exams[$exid]=$exam;
            }
            return $exams;
        }else{
            return false;
        }


    }

    public function setExamination($C_id,$Year,$Semester){
        $this->year=$Year;
        $this->Semester=$Semester;

        $query="select Sub_id,SubjectName from subject Where C_id='$C_id' and year='$Year' and semester='$Semester' and sub_id not in(select sub_id from exam where Active='T')";
        $result=Connection::connect($query);
        $subjects;
        while($row=mysql_fetch_array($result)){
            $sub1=new Subject();
            $subid=$row['Sub_id'];
            $sub1->Sub_id=$subid;
            $sub1->SubjectName=$row['SubjectName'];

            $subjects["$subid"]=$sub1;
        }
        #testing
        $this->Subjects=$subjects;
        return $subjects;


    }
    //    public function setExams(){
    //
    //    }
    public function saveExamination(){
        $file=new FileHandle();
        $text="Add new Examination $this->Exa_id";
        $file->setText($text);
        $query="insert into examination(Exa_id,ExaminationName,TeacherInCharge,StartDate,EndDate,Location,year,Semester,C_id) values('$this->Exa_id','$this->ExaminationName','$this->TeacherInCharge','$this->StartDate','$this->EndDate','$this->Location','$this->year','$this->Semester','$this->C_id')";
        Connection::connect($query);
        $exams=$this->Exams;



        $errr=false;
        foreach($this->Exams as $Exam){
            $Exam->Exa_id=$this->Exa_id;
            $add= $Exam->addExam();
            if($add==false){
                $errr=true;
            }
        }
        return $errr;

    }
    public function getAllExaminations(){
        $query="select * from examination ";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $exams;
            while($row=mysql_fetch_array($result)){
                $exam=new Examination();
                $exid=$row['Exa_id'];
                $exam->Exa_id=$exid;
                $exam->ExaminationName=$row['ExaminationName'];
                $exam->Location=$row['Location'];
                $exam->year=$row['year'];
                $exam->StartDate=$row['StartDate'];
                $exam->EndDate=$row['EndDate'];
                $exam->TeacherInCharge=$row['TeacherInCharge'];
                $exam->Semester=$row['Semester'];
                $exam->C_id=$row['C_id'];

                $exams[$exid]=$exam;

            }
            return $exams;
        }else{
            return false;
        }




    }

    public function getAllActiveExaminations(){

        $query="select * from examination where Active='T'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $exams;
            while($row=mysql_fetch_array($result)){
                $exam=new Examination();
                $exid=$row['Exa_id'];
                $exam->Exa_id=$exid;
                $exam->ExaminationName=$row['ExaminationName'];
                $exam->Location=$row['Location'];
                $exam->year=$row['year'];
                $exam->StartDate=$row['StartDate'];
                $exam->EndDate=$row['EndDate'];
                $exam->TeacherInCharge=$row['TeacherInCharge'];
                $exam->Semester=$row['Semester'];
                $exam->C_id=$row['C_id'];

                $exams[$exid]=$exam;

            }
            return $exams;
        }else{
            return false;
        }



    }
    public function getAllUpdateableExaminations(){
        $query="select * from examination where updateable='T' and Active='F'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $exams;
            while($row=mysql_fetch_array($result)){
                $exam=new Examination();
                $exid=$row['Exa_id'];
                $exam->Exa_id=$exid;
                $exam->ExaminationName=$row['ExaminationName'];
                $exam->Location=$row['Location'];
                $exam->year=$row['year'];
                $exam->StartDate=$row['StartDate'];
                $exam->EndDate=$row['EndDate'];
                $exam->TeacherInCharge=$row['TeacherInCharge'];
                $exam->Semester=$row['Semester'];
                $exam->C_id=$row['C_id'];

                $exams[$exid]=$exam;

            }
            return $exams;
        }else{
            return false;
        }






    }
    public function getAllUnupdateExaminations(){
          $query="select * from examination where updateable='F' and Active='F'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $exams;
            while($row=mysql_fetch_array($result)){
                $exam=new Examination();
                $exid=$row['Exa_id'];
                $exam->Exa_id=$exid;
                $exam->ExaminationName=$row['ExaminationName'];
                $exam->Location=$row['Location'];
                $exam->year=$row['year'];
                $exam->StartDate=$row['StartDate'];
                $exam->EndDate=$row['EndDate'];
                $exam->TeacherInCharge=$row['TeacherInCharge'];
                $exam->Semester=$row['Semester'];
                $exam->C_id=$row['C_id'];

                $exams[$exid]=$exam;

            }
            return $exams;
        }else{
            return false;
        }
    }
    public function closeExamination(){
        $file=new FileHandle();
        $text="Examination closed for $this->Exa_id";
        $file->setText($text);
        $query="update examination set Active='F' where Exa_id='$this->Exa_id'";
        Connection::connect($query);
        $query="update exam set Active='F' where Exa_id='$this->Exa_id'";
        Connection::connect($query);
        //echo $query;
    }
    public function stopUpdateExamination(){

        $file=new FileHandle();
        $text="Examination closed for updating $this->Exa_id";
        $file->setText($text);
        $query="update examination set updateable='F' where Exa_id='$this->Exa_id'";
        Connection::connect($query);
        //    $query="update exam set Active='F' where Exa_id='$this->Exa_id'";
        //    Connection::connect($query);

    }
    public function resetExamination(){
          $file=new FileHandle();
        $text="This examination was reset aginst rules $this->Exa_id";
        $file->setText($text);
        $query="update examination set updateable='T' where Exa_id='$this->Exa_id'";
        Connection::connect($query);
    }
    public function setExams(){
        $query="select * from exam where Exa_id='$this->Exa_id'";
        $result=Connection::connect($query);
        $Exams;
        while($row=mysql_fetch_array($result)){
            $ex=new Exam();
            $exid=$row['Exam_id'];
            $ex->Examid=$exid;
            //  $ex->ExamName=$row['ExamName'];
            $ex->AssignementPercs=$row['AssignmentPercentage'];
            $ex->AttendancePercs=$row['AttendancePercentage'];
            $ex->Active=$row['Active'];
            //  $ex->Sub_id=$row['Sub_id'];
            $ex->Afrom=$row['Afrom'];
            $ex->Bfrom=$row['Bfrom'];
            $ex->Cfrom=$row['Cfrom'];
            $ex->Dfrom=$row['Dfrom'];
            $ex->Exa_id=$row['Exa_id'];
            $ex->Sub_id=$row['Sub_id'];
            $Exams["$exid"]=$ex;
        }
        #testing
        $this->Exams=$Exams;

    }
}
?>
