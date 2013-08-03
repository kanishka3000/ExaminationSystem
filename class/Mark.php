<?php


/**
 * Description of Mark
 *create table Mark(Markid varchar(10) primary key,Assignment int(5)
default '0',Paper int(5) default '0',Empty varchar(3) default
'T',RegistrationId varchar(10) references Student
(RegistrationId),Examid varchar(10) references Exam(Examid));

 * @author Kanishka
 */
include_once("Connection.php");
require_once("Student.php");
require_once("ExaSubject.php");
class Mark {
    public $Markid;
    public $Shy;
    public $Assignment;
    public $Paper;
    public $Empty;
    public $RegistrationNo;
    public $ExamId;
    public $Attended;
    public $AttendanceMk;


    public $Note;

    public $MarkError;
    public $SaveError;


    public $NotAShift=false;
     public $NotAShift2=false;
    public function Mark(){
        $this->Attended="F";
    }
    public function getEmptyMarks($ExamId){
        $Marks;
        $query="select * from Mark where ExamId='$ExamId' and empty='T'";

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
            $ma->AttendanceMk=$row['Attendance'];
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
    public function studentDidExam($RegistrationNo,$Sub_id){

        $query="select * from Mark where RegistrationId='$RegistrationNo' and Examid in (select Exam_id from exam where Sub_id='$Sub_id')";
        // echo $query;
        $result=Connection::connect($query);
//        $this->Shy=Connection::$affectedrows+1;
//        if(Connection::$affectedrows!=0){
//            $this->Note['AttemptNote']="Multiple attempts detected:attempt assigned to $this->Shy on Student $this->RegistrationNo";
//        }
        $Marks;
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
            $ma->AttendanceMk=$row['Attendance'];
            $ma->Attended=$row['Attended'];
            $Marks["$maid"]=$ma;
        }
        if(Connection::$affectedrows!=0){
            return $Marks;
        }else{
            return false;
        }



    }
    public function studentAttendedExam($RegistrationNo,$Sub_id){
        $query="select * from Mark where RegistrationId='$RegistrationNo' and Examid in (select Exam_id from exam where Sub_id='$Sub_id') and Attended='T'";
        // echo $query;
        $result=Connection::connect($query);
        $this->Shy=Connection::$affectedrows+1;
        if(Connection::$affectedrows!=0){
            $this->Note['AttemptNote']="Multiple attempts detected:attempt assigned to $this->Shy on Student $this->RegistrationNo";
        }
        $Marks;
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
            $ma->AttendanceMk=$row['Attendance'];
            $Marks["$maid"]=$ma;
        }
        if(Connection::$affectedrows!=0){
            return $Marks;
        }else{
            return false;
        }
    }
    public function addMarkEntry($RegistrationNo,$Examid){
        $query="insert into Mark (Shy,RegistrationId,Examid) values ('$this->Shy','$RegistrationNo','$Examid')";
        $result=Connection::connect($query);

    }
    public function setMarkVals(){
        if(!(isset($this->MarkError))){
            $query="insert into Mark (Shy,RegistrationId,Examid,Attended) values ('$this->Shy','$this->RegistrationNo','$this->ExamId','F')";
           $result=Connection::connect($query);
        }else{
          //  echo "unable to save";
           // echo $this->MarkError;
        }
    }
    public function saveExamMarks(){
        $query="update Mark set Paper='$this->Paper',Assignment='$this->Assignment',Attendance='$this->AttendanceMk',Attended='$this->Attended', Empty='F' where RegistrationId='$this->RegistrationNo' and Examid='$this->ExamId'";
        echo $qurey;
        $result=Connection::connect($query);
        if(Connection::$affectedrows==1){
            return true;
        }
        else{
            return false;
        }
    }
    public function setUpdateShy(){
        $newshy=($this->Shy)-1;

    $query="update Mark set Shy='$newshy' where RegistrationId='$this->RegistrationNo' and Examid='$this->ExamId' and Empty='T'";
    Connection::connect($query);
    
    }
    public function registerForExam(Student $student,$subjects){
        #$subjects is an array of Exasubject objects;
/*
 * functionality
 * read Student,read subjects,read Exam_id;
 * create new mark objects for each exasubject
 * check if student did the same subject
 * set the shy of each
 * save the mark Object
 * if the student has sat for the same exam without any marks it should be caught
 */
        $st=new Mark();
        $stMarks;
        if(is_array($subjects)){
        foreach($subjects as $subject){
            $stm=new Mark();
            $stm->ExamId=$subject->Exa_id;
            $stm->RegistrationNo=$student->RegistrationNo;
            $stm->setShy($subject->Exa_id,$subject);
            $stm->setMarkVals();
            $stmk=$subject->Exa_id;
            $stMarks["$stmk"]=$stm;

        }
        }
        return $stMarks;
    }
    public function setShy($Exam_id,$subject){
        $Marks= $this->studentDidExam($this->RegistrationNo, $subject->Sub_id);
        //print_r($Marks);
        if(is_array($Marks)){
            //echo "hallo its array";
            ksort($Marks);
            $no=count($Marks);
            $Marks=array_values($Marks);
            $lsmk=$Marks[($no-1)];
            //print_r($lsmk);
            if(($lsmk->Attended=='T') && (($lsmk->Shy)<3)){
                $this->Shy=($lsmk->Shy)+1;
            }elseif(($lsmk->Attended=='F') && (($lsmk->Shy)<4)){
                if($lsmk->Empty=="T"){
                   // echo $this->ExamId;
                    $this->MarkError="The student appeal duplicate Error";
                    //echo $this->MarkError;
                    //echo "Error";
                }else{
                $this->Shy=($lsmk->Shy)+1;
                $this->Note="Has an ability to appeal";}
            }else{
                $this->MarkError="Unacceptable attempt value $lsmk->Shy attempted";
            }
        }else{
            #To manage the the first attept
            $this->Shy=1;
        }
    }
}
?>
