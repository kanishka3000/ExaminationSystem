<?php


/**
 * Description of AddSubject
 *
 * @author Kanishka
 */
require_once("Subject.php");
require_once("Connection.php");
class AddSubject extends Subject{
    public function saveSubject(){
       $query="insert into subject(Sub_id,SubjectName,minimumAttendance,year,semester,C_id) values('$this->Sub_id','$this->SubjectName','$this->minimumAttendance','$this->year','$this->semester','$this->C_id')"; 
       Connection::connect($query); 
    }
}
?>
