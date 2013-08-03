<?php


/**
 * create table Subject(Sub_id char(10) primary key,subjectName varchar
(50),minimumattendance int(5),year varchar(3),semester varchar(3),C_id
varchar(10) references Course(C_id));
 * Description of Subject
 * Exam(Examid,ExamName,Active,AssignmentPercentage,Afrom,Bfrom,Cfrom,Dfrom,C_id);
 *
 *
 * create table Subject(Sub_id varchar(10) primary key,SubjectName
varchar(20),minimumAttendance int(6),year int(6),semester int(6),C_id varchar(10) references Course(C_id));

 * @author Kanishka
 */
include_once('Exam.php');
include_once("Connection.php");
class Subject {
    function  Subject(){
    }
    public $Sub_id;
    public $SubjectName;
    public $minimumAttendance;
    public $year;
    public $semester;
    public $C_id;



    public $Exams;
    public function getSubjects($C_id){

        $query="select * from Subject where C_id='$C_id'";
        $result=Connection::connect($query);
        $subjects;
        while($row=mysql_fetch_array($result)){
            $sub1=new Subject();
            $subid=$row['Sub_id'];
            $sub1->Sub_id=$subid;
            $sub1->SubjectName=$row['SubjectName'];
            $sub1->minimumAttendance=$row['minimumAttendance'];
            $sub1->semester=$row['semester'];
            $sub1->year=$row['year'];
            $sub1->C_id=$row['C_id'];
            $sub1->setExams();
            $subjects["$subid"]=$sub1;
        }
        #testing
        return $subjects;
    }

    public function newExam($Examid,$ExamName,$AssignmentPerc,$Afrom,$Bfrom,$Cfrom,$Dfrom){
        $exa=new Exam();
        $exa->Sub_id=$this->Sub_id;
        $exa->Examid=$Examid;
        $exa->ExamName=$ExamName;
        $exa->AssignementPercs=$AssignmentPerc;
        $exa->Afrom=$Afrom;
        $exa->Bfrom=$Bfrom;
        $exa->Cfrom=$Cfrom;
        $exa->Dfrom=$Dfrom;
        $boo= $exa->addExam();
        if($boo){
            return true;
        }
        else{
            return false;
        }
    }
    public function setExams(){
        $exa=new Exam();
        $this->Exams=$exa->getExams($this->Sub_id);
    }
    public function getExams(){
        return $this->Exams;
    }
    public function applyForExam($RegistrationNo){
        if(is_array($this->Exams)){
            foreach($this->Exams as $Ex){
                $Ex->applyForExam($RegistrationNo);
            }
        }
    }
}
?>
