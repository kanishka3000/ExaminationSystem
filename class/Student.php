<?php


/**
 * create table Student(RegistrationId varchar(10) primary
key,StudentName varchar(70),NationalId char(10),Address1 varchar
(100),Address2 varchar(100), Telephone char(10),Mobile char
(10),Nationality varchar(10),School varchar(50),University varchar
(50),Job varchar(30),Photo varchar(40),yearOfAttendance varchar(10));

 *
 * @author Kanishka
 */
require_once("Connection.php");
require_once("Course.php");
class Student {
    public $IndexNo;


    public $RegistrationNo;// this is a separate no for  the student course independant;

    public $year;
    public $Name;
    public $Address;
    public $Address2;
    public $Telephone;
    public $Mobile;
    public $nationalid;
    public $C_id;
    public $Nationality;
    public $School;
    public $University;
    public $job;
    public $Photo;
    public $RegistrationId;
    public $Courses;

    public $SaveError;
    
    public function studentExist($RegistrationNo){
        $query="select * from Student where RegistrationId='$RegistrationNo'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            #return the new student
            $stu;
            $row=mysql_fetch_array($result);
            $stu=new Student();
            $stu->RegistrationNo="$RegistrationNo";
            $stu->year=$row['yearOfAttendance'];
            $stu->nationalid=$row['NationalId'];
            $stu->Address=$row['Address1'];
            // $stu->C_id=$row[''];
            $stu->Name=$row['StudentName'];
            $stu->Nationality=$row['Nationality'];
            $stu->Address2=$row['Address2'];
            $stu->Mobile=$row['Mobile'];
            $stu->job=$row['Job'];
            $stu->School=$row['School'];
            $stu->Telephone=$row['Telephone'];
            $stu->Photo=$row['Photo'];
            $stu->University=$row['University'];
            return $stu;
        }
        else{
            return false;
        }
        #testing;

    }
    public function getAllActiveStudents(Course $course){
        $Ac_id=$course->Ac_id;
         //$query="select * from student where RegistrationId in(select RegistrationId from register where Ac_id='$Ac_id') order by RegistrationId";
       $query="select * from student right join register on student.RegistrationId=register.RegistrationId where register.Ac_id='$Ac_id'";
       $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            #return the new student
            $student;
            while($row=mysql_fetch_array($result)){
                $stu=new Student();
                $stn=$row['RegistrationId'];
                $stu->RegistrationNo="$stn";
                $stu->year=$row['yearOfAttendance'];
                $stu->nationalid=$row['NationalId'];
                $stu->Address=$row['Address1'];
                // $stu->C_id=$row[''];
                $stu->IndexNo=$row['IndexNo'];
                $stu->Name=$row['StudentName'];
                $stu->Nationality=$row['Nationality'];
                $stu->Address2=$row['Address2'];
                $stu->Mobile=$row['Mobile'];
                $stu->job=$row['Job'];
                $stu->School=$row['School'];
                $stu->Telephone=$row['Telephone'];
                $stu->Photo=$row['Photo '];
                $student["$stn"]=$stu;
            }
            return $student;

        }
        else{
            return false;
        }




    }
    public function getAllStudents(){
        $query="select * from Student";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            #return the new student
            $student;
            while($row=mysql_fetch_array($result)){
                $stu=new Student();
                $stn=$row['RegistrationId'];
                $stu->RegistrationNo="$stn";
                $stu->year=$row['yearOfAttendance'];
                $stu->nationalid=$row['NationalId'];
                $stu->Address=$row['Address1'];
                // $stu->C_id=$row[''];
                $stu->Name=$row['StudentName'];
                $stu->Nationality=$row['Nationality'];
                $stu->Address2=$row['Address2'];
                $stu->Mobile=$row['Mobile'];
                $stu->job=$row['Job'];
                $stu->School=$row['School'];
                $stu->Telephone=$row['Telephone'];
                $stu->Photo=$row['Photo '];
                $student["$stn"]=$stu;
            }
            return $student;

        }
        else{
            return false;
        }
    }
    public function setCourses(){
        $cr=new Course();
        $this->Courses=$cr->getActiveCourses($this->RegistrationNo);


    }
    public function getCourses(){
        return $this->Courses;
    }
public function saveStudent(){
    
    if($this->RegistrationNo!=null){

        if(!($this->studentExist($this->RegistrationNo))){
    $this->setYear();
    $query="INSERT INTO student  (RegistrationId, StudentName, NationalId, Address1, Address2, Telephone, Mobile, Nationality, School, University, Job, Photo, yearOfAttendance) VALUES('$this->RegistrationNo','$this->Name','$this->nationalid','$this->Address','$this->Address2','$this->Telephone','$this->Mobile','$this->Nationality','$this->School','$this->University','$this->job','$this->Photo','$this->year')";
    $result=Connection::connect($query);
    if(Connection::$affectedrows!=0){      
        return true;
    }else{
        $this->SaveError[]="Student Registration failed For Student Please make sure no data is duplicated";
        return false;
    }
    }else{
        $this->SaveError[]="This student is duplicated Please check";
        return false;
    }
    }else{
        throw new Exception("empty Student");
    }

}
public function setYear(){
    $year=date("Y");
    $this->year=$year;

}
public function editByProperty($Property,$value){
    $Property1;
    if($Property=="name"){
        $Property1="StudentName";
    }elseif($Property=="address"){
         $Property1="Address1";
    }elseif($Property=="saddress"){
         $Property1="Address2";
    }elseif($Property=="telephone"){
         $Property1="Telephone";
    }elseif($Property=="mobile"){
         $Property1="Mobile";
    }elseif($Property=="university"){
         $Property1="University";
    }
    $query="update Student set $Property1 ='$value' where RegistrationId='$this->RegistrationNo'";
    Connection::connect($query);

}

}
?>
