<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StExam
 *
 * @author Kanishka
 */
require_once("Mark.php");
class StExam extends Mark{
    public  $StudentName;
    public $IndexNo;
    public $checkIt="F";

     public $updated=false;
public $PaperEdit;
public function updateExamMarks(){
    
    if($this->updated){
        /*Testing the updating system*/
       // $query="update mark set Paper='$this->PaperEdit',PaperEdit='$this->Paper' where RegistrationId='$this->RegistrationNo' and Examid='$this->ExamId'";
       $query="update mark set Paper='$this->PaperEdit',PaperEdit='$this->Paper' where RegistrationId='$this->RegistrationNo' and Examid='$this->ExamId' and Markid='$this->Markid'";
         $result=Connection::connect($query);
        if(Connection::$affectedrows==1){
            return true;
        }else{
            echo Connection::$affectedrows;
            return false;
//            echo $query;
//            echo "<br/>";
        }
        
    }
    
    
//
//    $query="update Mark set Paper='$this->Paper',Assignment='$this->Assignment',Attendance='$this->AttendanceMk',Attended='$this->Attended', Empty='F' where RegistrationId='$this->RegistrationNo' and Examid='$this->ExamId'";
//        echo $qurey;
       
}

}
?>
