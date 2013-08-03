<?php
/**
 * Description of ExcellDataManager
 *
 * @author Kanishka
 */
require_once("Examination.php");
require_once("Connection.php");
require_once("StExam.php");
require_once("FileHandle.php");
class ExcellDataManager {
    public $Subjects;
    #
    public $C_id;

    public $Sub_id;
    public $SubjectName;


    public $Marks;

    public $check="F";

    public $Error=false;
    public $ShiftError;

    public $NotAShift=false;
    public function setSubject(Examination $Exam){


        $exid=$Exam->Exa_id;
        $year=$Exam->year;
        $semester=$Exam->Semester;
        $cid=$Exam->C_id;

        $file=new FileHandle();
        $text="Genarate Excell  marks for $exid";
        $file->setText($text);




        $query="select Sub_id,SubjectName from subject where C_id='$cid' and year='$year' and semester='$semester' ";
        //echo $query;
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $suje;
            while($row=mysql_fetch_array($result)){
                $ex=new ExcellDataManager();
                $subid=$row['Sub_id'];
                $ex->Sub_id=$subid;
                $ex->SubjectName=$row['SubjectName'];
                $ex->C_id=$cid;
                $ex->setDataToSubjects();


                $suje[$subid]=$ex;
            }
            $this->Subjects=$suje;
        }
    }
    public function setDataToSubjects(){
        //$query="select * from mark left join Student on mark.RegistrationId=Student.RegistrationId where Examid in (select Exam_id from Exam where Sub_id='$this->Sub_id') and Empty='T'  order by Mark.RegistrationId";
        //   echo $query;// how to connect the register table to get the index no values;
        $query="select * from mark left join Student on mark.RegistrationId=Student.RegistrationId left join register on Mark.RegistrationId=register.RegistrationId and register.Ac_id in (select Ac_id from activecourse where C_id='$this->C_id') where Examid in (select Exam_id from Exam where Sub_id='$this->Sub_id') and Empty='T'  order by Mark.RegistrationId";
        $result=Connection::connect($query);

        if(Connection::$affectedrows!=0){
            $Marks;
            while($row=mysql_fetch_array($result)){
                $ma=new StExam();
                $maid=$row['Markid'];
                $marg=$row['RegistrationId'];
                $ma->Markid=$maid;
                $ma->Shy=$row['Shy'];
                $ma->Assignment=$row['Assignment'];
                $ma->Paper=$row['Paper'];
                $ma->Empty=$row['Empty'];
                $ma->RegistrationNo=$row['RegistrationId'];
                $ma->ExamId=$row['Examid'];
                $ma->StudentName=$row['StudentName'];
                $ma->IndexNo=$row['IndexNo'];
                if(($ma->Shy)<4){
                    $Marks["$marg"]=$ma;
                }else{
                    $this->ShiftError[]="UnAcceptable Occurance attempt value in Mark $ma->RegistrationNo";
                }


            }

            $this->Marks=$Marks;

        }
    }
    public function setSubjectUpdate(Examination $Exam){
        $exid=$Exam->Exa_id;
        $year=$Exam->year;
        $semester=$Exam->Semester;
        $cid=$Exam->C_id;

        $file=new FileHandle();
        $text="Genarate Excell  marks for $exid";
        $file->setText($text);




        $query="select Sub_id,SubjectName from subject where C_id='$cid' and year='$year' and semester='$semester' ";
        //echo $query;
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $suje;
            while($row=mysql_fetch_array($result)){
                $ex=new ExcellDataManager();
                $subid=$row['Sub_id'];
                $ex->Sub_id=$subid;
                $ex->SubjectName=$row['SubjectName'];
                $ex->setDataToSubjectUpdate($exid);


                $suje[$subid]=$ex;
            }
            $this->Subjects=$suje;
        }


    }
    public function setDataToSubjectUpdate($Exa_id){
        $query="select * from mark left join Student on mark.RegistrationId=Student.RegistrationId where Examid in (select Exam_id from Exam where Exa_id='$Exa_id' and Sub_id='$this->Sub_id') and Empty='F' and Attended='T' order by Mark.RegistrationId";
        //   echo $query;// how to connect the register table to get the index no values;

        $result=Connection::connect($query);

        if(Connection::$affectedrows!=0){
            $Marks;
            while($row=mysql_fetch_array($result)){
                $ma=new StExam();
                $maid=$row['Markid'];
                $marg=$row['RegistrationId'];
                $ma->Markid=$maid;
                $ma->Shy=$row['Shy'];
                $ma->Assignment=$row['Assignment'];
                $ma->AttendanceMk=$row['Attendance'];
                $ma->Paper=$row['Paper'];
                $ma->Empty=$row['Empty'];
                $ma->RegistrationNo=$row['RegistrationId'];
                $ma->ExamId=$row['Examid'];
                $ma->StudentName=$row['StudentName'];
                if(($ma->Shy)<4){
                    $Marks["$marg"]=$ma;
                }else{
                    $this->ShiftError[]="UnAcceptable Occurance attempt value in Mark $ma->RegistrationNo";
                }


            }

            $this->Marks=$Marks;

        }
    }




    public function getSubjects(){

    }
    public function validateUpdateData(){

        foreach($this->Subjects as $subject){
            //print_r($subject);
            if($subject->check=="F"){
                $this->Error['SheetError']="Error Occured Following Sheet Missing:$subject->Sub_id";
                // break;
            }else{
                $Mark=$subject->Marks;
                if(is_array($Mark)){
                    foreach($Mark as $mk){
                        if($mk->checkIt=="F"){
                            $this->Error['MarkError'][]="Error Occured in the Following Sheet :$subject->Sub_id in Mark NO:$mk->RegistrationNo";
                            //   break;
                        }
                        #validatinga marks for the attendance


                        #validating marks for the assignement

                        #validating the marks for the paper;

                        //                echo "not absent<br/>";
                        //                print_r($mk);
                        $mk->Attended="T";
                        if(!(is_numeric($mk->Paper))){
                            $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! value: $mk->Paper";
                            // break;
                        }else{
                            if(intval($mk->Paper)>100 || intval($mk->Paper)<0){
                                $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! Mark larger than 100 or less than 0 $mk->Paper";
                            }

                        }

                    }
                }
            }

        }
        if($this->Error){
            return true;
        }
        else{
            return false;
        }









    }





    public function validateData(){
        foreach($this->Subjects as $subject){
            //print_r($subject);
            if($subject->check=="F"){
                $this->Error['SheetError']="Error Occured Following Sheet Missing:$subject->Sub_id";
                // break;
            }else{
                $Mark=$subject->Marks;
                if(is_array($Mark)){
                    foreach($Mark as $mk){
                        if($mk->checkIt=="F"){
                            $this->Error['MarkError'][]="Error Occured in the Following Sheet :$subject->Sub_id in Mark NO:$mk->RegistrationNo";
                            //   break;
                        }
                        #validatinga marks for the attendance
                        if($mk->AttendanceMk=="AB" || $mk->AttendanceMk=="ab"){
                            //       echo "its absent<br/>";
                            //                print_r($mk);
                            $mk->Assignment=0;
                            // $mk->Attended="F";

                        }else{
                            if($mk->AttendanceMk=="NA"|| $mk->AttendanceMk=="na"){
                                $mk->AttendanceMk=0;
                                $mk->NotAShift2=true;
                            }




                            //                echo "not absent<br/>";
                            //                print_r($mk);
                            // $mk->Attended="T";
                            if(!(is_numeric($mk->AttendanceMk))){
                                $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! value: $mk->AttendanceMk";
                                // break;
                            }else{
                                if(intval($mk->AttendanceMk)>100 || intval($mk->AttendanceMk)<0){
                                    $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! Mark larger than 100 or less than 0 $mk->AttendanceMk";

                                }else{
                                    if($mk->NotAShift2){
                                        $mk->AttendanceMk=-1;
                                    }


                                }

                            }
                        }



                        #validating marks for the assignement
                        if($mk->Assignment=="AB" || $mk->Paper=="ab"){
                            //       echo "its absent<br/>";
                            //                print_r($mk);
                            $mk->Assignment=0;
                            // $mk->Attended="F";

                        }else{
                            if($mk->Assignment=="NA"|| $mk->Assignment=="na"){
                                $mk->Assignment=0;
                                $mk->NotAShift=true;
                            }

                            //                echo "not absent<br/>";
                            //                print_r($mk);
                            // $mk->Attended="T";
                            if(!(is_numeric($mk->Assignment))){
                                $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! value: $mk->Assignment";
                                // break;
                            }else{
                                if(intval($mk->Assignment)>100 || intval($mk->Assignment)<0){
                                    $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! Mark larger than 100 or less than 0 $mk->Assignment";



                                }else{
                                    if($mk->NotAShift){
                                        $mk->Assignment=-1;
                                    }
                                }

                            }
                        }


                        #validating the marks for the paper;
                        if($mk->Paper=="AB" || $mk->Paper=="ab"){
                            //       echo "its absent<br/>";
                            //                print_r($mk);
                            $mk->Paper=0;
                            $mk->Attended="F";

                        }else{
                            //                echo "not absent<br/>";
                            //                print_r($mk);
                            $mk->Attended="T";
                            if(!(is_numeric($mk->Paper))){
                                $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! value: $mk->Paper";
                                // break;
                            }else{
                                if(intval($mk->Paper)>100 || intval($mk->Paper)<0){
                                    $this->Error['MarkError'][]="Unacceptable Mark value in $subject->Sub_id in Mark $mk->RegistrationNo!! Mark larger than 100 or less than 0 $mk->Paper";
                                }

                            }
                        }
                    }
                }
            }

        }
        if($this->Error){
            return true;
        }
        else{
            return false;
        }
    }
    public function saveData(){
        if(!($this->Error)){
            $file=new FileHandle();

            $file->setText($text);
            foreach($this->Subjects as $subject){
                //print_r($subject);
                $text="Adding data for $subject->Sub_id";
                $Mark=$subject->Marks;
                if(is_array($Mark)){
                    foreach($Mark as $mk){
                        $res=$mk->saveExamMarks();
                        if($res!=true){
                            $this->Error[]="Saving duplication or unknown error";
                           // echo "error please abort process:";
                            $text="Fatal error in mark id check --->$mk->Markid";
                            $file->setText($text);
                            break;
                        }
                    }
                }
            }
        }
    }

    public function updateData(){
        if(!($this->Error)){
            $file=new FileHandle();

            $file->setText($text);
            foreach($this->Subjects as $subject){
                //print_r($subject);
                $text="Adding data for $subject->Sub_id";
                $Mark=$subject->Marks;
                if(is_array($Mark)){
                    $res=false;
                    foreach($Mark as $mk){
                        if($mk->updated){
                            $res=$mk->updateExamMarks();
                        }else{
                            $res=true;
                        }
                        if($res!=true){
                            echo "error please abort process:$mk->Markid";
                            $text="Fatal error at $mk->Markid";
                            $file->setText($text);
                            break;
                        }
                    }
                }
            }
        }


    }
}
?>
