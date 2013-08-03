<?php
/**
 * Description of Course
 *
 * @author Kanishka
 */
require_once("Subject.php");
include_once("Connection.php");
require_once("ExaSubject.php");
require_once("Student.php");
class Course {
    public $Subjects;
    public $Ac_id;
    public $C_id;
    public $CourseName;
    public $LecturerInCharge;
    public $Years;
    public $Degree;


    public $StartDate;
    public $Batch;
    public $Error;
    public function getTotalActiveCourses(){
        $Courses;
        $query="select * from ActiveCourse left join Course on ActiveCourse.C_id=Course.C_id ";
        $result= Connection::connect($query);
        #Code to get and set the objects which are hard corded below;
        while($row=mysql_fetch_array($result)){
            $course1=new Course();
            $ac=$row['Ac_id'];
            $course1->Ac_id=$ac;
            $course1->C_id=$row['C_id'];
            $course1->CourseName=$row['CourseName'];
            $course1->LecturerInCharge=$row['LecturerInCharge'];
            $course1->Years=$row['Years'];
            $course1->StartDate=$row['StartDate'];
            $course1->Degree=$row['Degree'];
            $Courses["$ac"]=$course1;
        }
        if(Connection::$affectedrows!=0){
            return $Courses;
        }
        else{
            return false;
        }
    }
    public function getAllActiveCourses(){
        $Courses;
        $query="select * from ActiveCourse left join Course on ActiveCourse.C_id=Course.C_id where Current='T'";
        $result= Connection::connect($query);
        #Code to get and set the objects which are hard corded below;
        while($row=mysql_fetch_array($result)){
            $course1=new Course();
            $ac=$row['Ac_id'];
            $course1->Ac_id=$ac;
            $course1->C_id=$row['C_id'];
            $course1->CourseName=$row['CourseName'];
            $course1->LecturerInCharge=$row['LecturerInCharge'];
            $course1->StartDate=$row['StartDate'];
            $course1->Years=$row['Years'];
            $course1->Degree=$row['Degree'];
            $Courses["$ac"]=$course1;
        }
        if(Connection::$affectedrows!=0){
            return $Courses;
        }
        else{
            return false;
        }
    }
    public function getAllInaciveActiveCourses(){
        $Courses;
        $query="select * from ActiveCourse left join Course on ActiveCourse.C_id=Course.C_id where Current='F'";
        $result= Connection::connect($query);
        #Code to get and set the objects which are hard corded below;
        while($row=mysql_fetch_array($result)){
            $course1=new Course();
            $ac=$row['Ac_id'];
            $course1->Ac_id=$ac;
            $course1->C_id=$row['C_id'];
            $course1->CourseName=$row['CourseName'];
            $course1->LecturerInCharge=$row['LecturerInCharge'];
            $course1->StartDate=$row['StartDate'];
            $course1->Years=$row['Years'];
            $course1->Degree=$row['Degree'];
            $Courses["$ac"]=$course1;
        }
        if(Connection::$affectedrows!=0){
            return $Courses;
        }
        else{
            return false;
        }
    }
    public function getAllCourses(){
        $Course;
        $query="select * from Course";
        $result=Connection::connect($query);

        while($row=mysql_fetch_array($result)){
            $course1=new Course();
            $cid=$row['C_id'];
            $course1->C_id=$cid;
            $course1->CourseName=$row['CourseName'];
            $course1->LecturerInCharge=$row['LecturerInCharge'];
            $course1->Years=$row['Years'];
            $course1->Degree=$row['Degree'];
            $Course["$cid"]=$course1;
        }
        if(Connection::$affectedrows!=0){
            return $Course;
        }
        else{
            return false;
        }
    }
    public function setSubjects(){
        $sub=new Subject();
        $this->Subjects=$sub->getSubjects($this->C_id);

    }
    public function getSubjects(){
        return $this->Subjects;

    }
    public function setSubject(){


    }
    public function getActiveCourses($RegistrationId){
        $query="select * from register left join Activecourse on Register.ac_id=ActiveCourse.ac_id where ActiveCourse.current='T' and RegistrationId='$RegistrationId'";
        $result=Connection::connect($query);
        $cour;
        while($row=mysql_fetch_array($result)){
            $course2=new Course();
            $ac=$row['Ac_id'];
            $course2->Ac_id=$ac;
            $course2->C_id=$row['C_id'];
            $course2->CourseName=$row['CourseName'];
            $course2->LecturerInCharge=$row['LecturerInCharge'];
            $course2->Years=$row['Years'];
            $cour["$ac"]=$course2;
        }
        if(Connection::$affectedrows!=0){
            return $cour;
        }else{
            return false;
        }
    }
    public function getYears(){
        return $this->Years;
    }
    public function getSemestersForYear($year){
        $query="select semester from Subject where year='$year' and C_id='$this->C_id' group by semester";
        Connection::connect($query);
        $semesters=Connection::$affectedrows;
        return $semesters;
    }
    public function getExamSubjects($Ac_id){
        $query="select * from exam left join subject on exam.sub_id=subject.sub_id where subject.C_id=(select C_id from activecourse where Ac_id='$Ac_id') and exam.Active='T'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            $subjects;
            while($row=mysql_fetch_array($result)){
                $sub1=new ExaSubject();
                $subid=$row['Sub_id'];
                $sub1->Exa_id=$row['Exam_id'];
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
            $this->Subjects=$subjects;
            return $subjects;
        }
        else{
            return false;
        }
    }
    public function registerForActiveCourse(Student $student){
        $res=$this->studentReigstred($student);
        if($res){
            $query="insert into register(RegistrationId,IndexNo,Ac_id,RegistrationDate,RegistrationTime) values('$student->RegistrationNo','$student->IndexNo','$this->Ac_id',curdate(),curtime())";
            //echo $query;
            Connection::connect($query);
        }else{
            $this->Error="Registration duplication error";
        }
    }
    public function studentReigstred(Student $student){
        $query="select * from register where RegistrationId='$student->RegistrationNo' and Ac_id='$this->Ac_id'";
        Connection::connect($query);
        if(Connection::$affectedrows==0){
            return true;
        }else{
            return false;
        }
    }
    /*Field
---------
Ac_id
batch
StartDate
Current
C_id
---------
     */
    public function addNewActiveCourse(){
        $res=$this->activeCourseExist();
        if($res){
            $query="insert into activecourse (Ac_id,batch,StartDate,Current,C_id) values('$this->Ac_id','$this->Batch','$this->StartDate','T','$this->C_id')";
            Connection::connect($query) ;
            if(Connection::$affectedrows!=1){
                $this->Error="Save failure Unknown reason";
            }
        }else{
            $this->Error="The course Id was Duplicated,Save Process Aborted";
        }
    }
    public function activeCourseExist(){
        $query="select * from activecourse where Ac_id='$this->Ac_id'";
        Connection::connect($query);
        if(Connection::$affectedrows==0){
            return true;
        }else{
            return false;
        }
    }
    public function closeActiveCourse(){
        $query="update activecourse set Current='F' where Ac_id='$this->Ac_id'";
        Connection::connect($query);
        if(Connection::$affectedrows!=1){
            $this->Error="Unknown Update error.Require Manual assistance";
        }
    }
}
?>
