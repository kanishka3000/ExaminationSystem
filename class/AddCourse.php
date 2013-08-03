<?php
/**
 * Description of AddCourse
 *
 * @author Kanishka
 */
require_once("Course.php");
require_once("AddSubject.php");

require_once("Connection.php");

class AddCourse extends Course{
    public $CourseYears;#layer 1;
    public $Year;

    public $NoOfSubjects;#layer 2;
    public $CurrNo;


    public $TotSubno;
    public function AddCourse(){
    $this->CurrNo=1;
    $this->TotSubno=1;
    }
    public function setYears(){
        // this creates AddCourse objects for each Year of the Corse depending on the years specified;
        if(is_int($this->Years)){
            $tempC;
            for($i=0;$i<$this->Years;$i++){
                $Cors=new AddCourse();
                $Cors->Year=$i+1;
                $Cors->C_id=$this->C_id;
                $no=$i+1;
                $tempC["$no"]=$Cors;
            }
            $this->CourseYears=$tempC;
            $this->Year=1;
        }
        else{
            throw new Exception('NOt a number');
        }
    }
    public function setSubjects($noSubjects){
        $i=0;
        foreach($this->CourseYears as $coye){
        $coye->setNoOfSubjects($noSubjects[$i]);
        $coye->createSubjects();
        $i++;
        }
    }

    public function setNoOfSubjects($NoOfSubjects){
        
        $this->NoOfSubjects=$NoOfSubjects;
        
    }
    public function createSubjects(){
        $temp;
        for($i=0;$i<$this->NoOfSubjects;$i++){
            $sub=new AddSubject();
            $subid=$this->C_id.$this->Year."0".$this->TotSubno;
            $this->TotSubno++;
            
            $sub->Sub_id=$subid;
            $sub->C_id=$this->C_id;
            $sub->year=$this->Year;
            //$sub->semester;has to be set after this;
            $temp[$subid]=$sub;
        }
        $this->Subjects=$temp;
    }
    public function saveAll(){
        $query="insert into course(C_id,CourseName,LecturerInCharge,Years,Degree) values('$this->C_id','$this->CourseName','$this->LecturerInCharge','$this->Years','$this->Degree')";
        Connection::connect($query);
        foreach($this->CourseYears as $course){
            foreach($course->Subjects as $cors){
                $cors->saveSubject();
            }
        }
    }

}
?>
