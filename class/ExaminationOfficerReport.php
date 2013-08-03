<?php


/**
 * Description of ExaminationOfficerReport
 *create table Exam(Exam_id varchar(10) primary key,ExamName varchar(20),Active varchar(3) default 'T',
 * AssignmentPercentage int(4),Afrom int(4),Bfrom int(4),Cfrom int(4),Dfrom int(4),Sub_id varchar(10) references Subject(Sub_id));

create table Mark(Markid int(5) primary key auto_increment,Shy int(3),Assignment int(5) default '0',Paper int(5) default '0',
 * Empty varchar(3) default 'T',
 * RegistrationId varchar(10) references Student(RegistrationId),Examid varchar(10) references Exam(Examid));
 * @author Kanishka
 */
require_once("reports.php");
require_once("Exam.php");
require_once("Mark.php");
require_once("Connection.php");

class ExaminationOfficerReport implements Reports {
    public $ExamId;
    public $ExamName;
    public $AssignmentPercentage;
    public $AttendancePercentage;
    public $Afrom;
    public $Bfrom;
    public $Cfrom;
    public $Dfrom;
    public $Sub_id;

    public $Markid;
    public $Assignment;
    public $Attendance;
    public $Paper;
    public $PaperEdit;
    public $RegistrationId;
    public $Indexid;
    public $Name;
    public $Rank;
    public $Mark;
    public $shy;

    public $Total;
    public $Average;

    protected $count=0;
    #

    public function genarateReport(){



    }
    public function getStudentsPersonalInformation($RegistrationNo){
        $std=new Student();
        $student= $std->studentExist($RegistrationNo);
        if($student){
            return $student;
        }else{
            return false;
        }

    }
    public function setStudentEducationalInfromation($RegistrationId,$C_id){
        $query="select * from Mark left join exam on mark.Examid=exam.Exam_id where mark.Empty='F' and mark.RegistrationId='$RegistrationId' and exam.Sub_id in(select Sub_id from subject where C_id in(select C_id from Activecourse where Ac_id='$C_id')) ";
        #there is no single primary key
        $result=Connection::connect($query);
        $rep;

        while($row=mysql_fetch_array($result)){
            $re=new ExaminationOfficerReport();
            $re->RegistrationId=$row['RegistrationId'];
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            // $re->ExamName=$row['ExamName'];
            $re->Markid=$row['Markid'];
            $re->AssignmentPercentage=$row['AssignmentPercentage'];
            $re->AttendancePercentage=$row['AttendancePercentage'];
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

            $rep[]=$re;
        }
        if($this->count!=0){
            $this->Average=$this->Total/$this->count;
        }
        else{
            $this->Average=0;
        }
        if(Connection::$affectedrows!=0){
            return $rep;
        }
        else{
            return false;
        }
    }
    public function setRank(){
        //+to set the mark value depending on the percentages of the marks;
        if($this->Assignment==-1){
            $this->AssignmentPercentage=0;
        }
        if($this->Attendance==-1){
            $this->AttendancePercentage=0;
        }

        $ass=($this->Assignment)*($this->AssignmentPercentage)/100;
        $pap=($this->Paper)*(100-($this->AssignmentPercentage)-($this->AttendancePercentage))/100;
        $att=($this->Attendance)*($this->AttendancePercentage)/100;

        $this->Mark= $ass+$pap+$att;
      //  $this->Mark=$pap;
        if($this->Mark>100){
            throw new Exception("invalid mark value");
        }
        if($this->Mark>$this->Afrom){
            $this->Rank="A";
        }else{
            if($this->Mark>$this->Bfrom){
                $this->Rank="B";

            }else{
                if($this->Mark>$this->Cfrom){
                    $this->Rank="C";

                }else{
                    if($this->Mark>$this->Dfrom){
                        $this->Rank="D";

                    }
                    else{
                        $this->Rank="F";
                    }
                }

            }
        }

        #
    }
    public function setAverageTotal(){

        if($this->count!=0){
            $this->Average=$this->Total/$this->count;
        }
        else{
            $this->Average=0;
        }

    }

    public function getTotal(){
        return $this->Total;
    }
    public function getAverage(){
        return $this->Average;

    }
    public function getExamInfromation($Exam_id){
        $query="select * from Exam right join mark on Exam.Exam_id=Mark.Examid where Mark.Empty='F' and Mark.Examid='$Exam_id'";
        $result=Connection::connect($query);
        $rep;

        while($row=mysql_fetch_array($result)){
            $re=new ExaminationOfficerReport();
            $re->RegistrationId=$row['RegistrationId'];
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            //    $re->ExamName=$row['ExamName'];
            $re->Markid=$row['Markid'];
            $re->AssignmentPercentage=$row['AssignmentPercentage'];
            $re->Paper=$row['Paper'];
            $re->Assignment=$row['Assignment'];
            $re->Afrom=$row['Afrom'];
            $re->Bfrom=$row['Bfrom'];
            $re->Cfrom=$row['Cfrom'];
            $re->Dfrom=$row['Dfrom'];
            $re->setRank();
            $this->count++;
            $this->Total=($this->Total)+($re->Mark);



            $rep[]=$re;

        }
        if($this->count!=0){
            $this->Average=$this->Total/$this->count;
        }
        else{
            $this->Average=0;

        }



        if(Connection::$affectedrows!=0){
            return $rep;
        }
        else{
            return false;
        }


    }
    public function setStudentYearlyEductionInformation($RegistrationId,$C_id,$Year){
        $query="select * from Mark left join exam on mark.Examid=exam.Exam_id left join Subject on Exam.Sub_id=Subject.Sub_id where Mark.Empty='F' and Subject.year='$Year' and mark.Empty='F' and mark.RegistrationId='$RegistrationId' and exam.Sub_id in(select Sub_id from subject where C_id in(select C_id from Activecourse where Ac_id='$C_id')) ";
        //
        //echo $query;
        #there is no single primary key
        $result=Connection::connect($query);
        $rep;
        while($row=mysql_fetch_array($result)){
            $re=new ExaminationOfficerReport();
            $re->RegistrationId=$row['RegistrationId'];
            $re->ExamId=$row['Exam_id'];
            $re->Sub_id=$row['Sub_id'];
            //  $re->ExamName=$row['ExamName'];
            $re->Markid=$row['Markid'];
            $re->AssignmentPercentage=$row['AssignmentPercentage'];
            $re->Paper=$row['Paper'];
            $re->Assignment=$row['Assignment'];
            $re->Afrom=$row['Afrom'];
            $re->Bfrom=$row['Bfrom'];
            $re->Cfrom=$row['Cfrom'];
            $re->Dfrom=$row['Dfrom'];
            $re->setRank();
            $this->count++;
            $this->Total=($this->Total)+($re->Mark);
            $rep[]=$re;
        }
        if($this->count!=0){
            $this->Average=$this->Total/$this->count;
        }
        else{
            $this->Average=0;
        }
        if(Connection::$affectedrows!=0){
            return $rep;
        }
        else{
            return false;
        }
    }

}
?>
