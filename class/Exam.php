<?php


/**
 * Description of Exam
 *
 * @author Kanishka
 * create table Exam(Exam_id varchar(10) primary key,ExamName varchar(20),Active varchar(3) default 'T',
AssignmentPercentage int(4),Afrom int(4),Bfrom int(4),Cfrom int(4),Dfrom int(4),Sub_id varchar(10) references
Subject(Sub_id));
 */
include_once("Connection.php");
include_once("Mark.php");
class Exam {
    public $Marks;
    public $Examid;
    public $ExamName;
    public $Active;
    public $AssignementPercs;
    public $AttendancePercs;
    public $Sub_id;
    public $Exa_id;


    public $Afrom;
    public $Bfrom;
    public $Cfrom;
    public $Dfrom;

    public $Error;

    public function selectAllExams(){
        $query="select * from Exam ";
        $result=Connection::connect($query);
        $Exams;
        while($row=mysql_fetch_array($result)){
            $ex=new Exam();
            $exid=$row['Exam_id'];
            $ex->Examid=$exid;
            // $ex->ExamName=$row['ExamName'];
            $ex->AssignementPercs=$row['AssignmentPercentage'];
            $ex->AssignementPercs=$row['AttendancePercentage'];
            $ex->Active=$row['Active'];
            $ex->Sub_id=$row['Sub_id'];
            $ex->Afrom=$row['Afrom'];
            $ex->Bfrom=$row['Bfrom'];
            $ex->Cfrom=$row['Cfrom'];
            $ex->Dfrom=$row['Dfrom'];
            $ex->Exa_id=$row['Exa_id'];
            $Exams["$exid"]=$ex;
        }
        #testing
        if(Connection::$affectedrows!=0){
            return $Exams;
        }else{
            return false;
        }
    }
    public function selectActiveExams(){
        $query="select * from Exam where active='T'";
        $result=Connection::connect($query);
        $Exams;
        while($row=mysql_fetch_array($result)){
            $ex=new Exam();
            $exid=$row['Exam_id'];
            $ex->Examid=$exid;
            // $ex->ExamName=$row['ExamName'];
            $ex->AssignementPercs=$row['AssignmentPercentage'];
            $ex->AssignementPercs=$row['AttendancePercentage'];
            $ex->Active=$row['Active'];
            $ex->Sub_id=$row['Sub_id'];
            $ex->Afrom=$row['Afrom'];
            $ex->Bfrom=$row['Bfrom'];
            $ex->Cfrom=$row['Cfrom'];
            $ex->Dfrom=$row['Dfrom'];
            $ex->Exa_id=$row['Exa_id'];
            $Exams["$exid"]=$ex;
        }
        #testing
        if(Connection::$affectedrows!=0){
            return $Exams;
        }
        else{return false;}

    }
    public function setMarks(){
        $mak=new Mark();
        $this->Marks=$mak->getEmptyMarks($this->Examid);

    }
    public function getMarkElements(){
        return $this->Marks;

    }
    public function addExam(){
        $query="insert into Exam(Exam_id,AssignmentPercentage,AttendancePercentage,Afrom,Bfrom,Cfrom,Dfrom,Sub_id,Exa_id) values ('$this->Examid','$this->AssignementPercs','$this->AttendancePercs','$this->Afrom','$this->Bfrom','$this->Cfrom','$this->Dfrom','$this->Sub_id','$this->Exa_id')";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
            return false;
        }
    }
    public function getExams($Sub_id){
        $query="select * from Exam where Sub_id='$Sub_id' and active='T'";
        $result=Connection::connect($query);
        $Exams;
        while($row=mysql_fetch_array($result)){
            $ex=new Exam();
            $exid=$row['Exam_id'];
            $ex->Examid=$exid;
            //  $ex->ExamName=$row['ExamName'];
            $ex->AssignementPercs=$row['AssignmentPercentage'];
            $ex->AssignementPercs=$row['AttendancePercentage'];
            $ex->Active=$row['Active'];
            $ex->Sub_id=$row['Sub_id'];
            $ex->Afrom=$row['Afrom'];
            $ex->Bfrom=$row['Bfrom'];
            $ex->Cfrom=$row['Cfrom'];
            $ex->Dfrom=$row['Dfrom'];
            $ex->Exa_id=$row['Exa_id'];
            $ex->Sub_id=$row['Sub_id'];
            $Exams["$exid"]=$ex;
        }
        #testing
        if(Connection::$affectedrows!=0){
            return $Exams;
        }
        else{return false;}

    }
    public function applyForExam($RegistrationNo){
        $ma=new Mark();
        // echo $this->Sub_id."hi<br/>";
        $result=$ma->studentDidExam($RegistrationNo,$this->Sub_id);
        $sh=Connection::$affectedrows;
        //  echo $sh."</br>";
        // echo $this->Examid."</br>";
        if($sh<3){
            $bool=$ma->addMarkEntry($RegistrationNo,$this->Examid);
        }
        elseif($sh==3){
            $bool=$ma->addMarkEntry($RegistrationNo,$this->Examid);
            $this->Error[]="Attempt registed as 4 unacceptable should be ";
        }
        else{
            $this->Error[]="Attempt more than 3 cancelled";
        }
    }
    public function closeExam($Examid){
        $query="update exam set active='F' where Exam_id='$Examid'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
            return false;
        }
    }
    public function getMarksForExamination($Exa_id){
        $query="select * from mark where Examid in(select Exam_id from exam where Exa_id='$Exa_id') and Empty='T'";
        echo $query;
        $result=Connection::connect($query);
        while($row=mysql_fetch_array($result)){
            $ma=new Mark();
            $maid=$row['Markid'];
            $ma->Markid=$maid;
            $ma->Shy=$row['Shy'];
            $ma->Assignment=$row['Assignment'];
            $ma->Paper=$row['Paper'];
            $ma->Empty=$row['Empty'];
            $ma->RegistrationNo=$row['RegistrationId'];
            $ma->ExamId=$row['Examid'];


            $Marks["$maid"]=$ma;
        }
        #testing
        if(Connection::$affectedrows!=0){
            return $Marks;
        }
        else{
            return false;
        }


    }

}
?>
