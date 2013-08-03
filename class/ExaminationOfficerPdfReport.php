<?php
/**
 * Description of ExaminationOfficerPdfReport
 *
 * @author Kanishka
 */
require_once("Updf.php");
require_once("ExaminationOfficerReport.php");
require_once("Connection.php");
class ExaminationOfficerPdfReport extends ExaminationOfficerReport{
    public $RegistrationId;
    public $Name;
    public $Gender;
    //
    public $Years;
    public $Subjects;
    //
    public $Sub_id;
    public $Year;
    public $SubjectName;
    public $Grade;
    public function getStudentTotalExamInformation($Ac_id){
        #this return examinationofficerpdf reports for all the students who did the course; on active course wise;
        $query="select * from mark left join exam on mark.examid=exam.exam_id left join subject on exam.sub_id=subject.sub_id left join student on student.RegistrationId=mark.RegistrationId where mark.RegistrationId in(select RegistrationId from register where Ac_id='$Ac_id') order by mark.Registrationid,subject.year";
        $result=Connection::connect($query);
        $Fstudent;//this is the final array to be returned;
        $Final;
        $Tempr=false;
        $Year=0;
        #incomplete

        while($row=mysql_fetch_array($result)){

            if(!($row['RegistrationId']==$Tempr->RegistrationId)){
               //different student;
                $student=new ExaminationOfficerPdfReport();
                $student->RegistrationId=$row['RegistrationId'];
                $student->Name=$row['StudentName'];
                $Tempr=$student;
                //$student->Gender=$row['Gender'];

                if(!($row['year']==$Year)){
                    $Year=$row['year'];



                }
            }
            else{
                if(!($row['year']==$Tempr->Year)){
                    //same student different year
                    $Year=$row['year'];


                }
                else{
                    //same student same year
                    $subj=new ExaminationOfficerPdfReport();
                    $subj->Sub_id=$row['Sub_id'];
                    $subj->SubjectName=$row['SubjectName'];
                    $subj->Year=$row['year'];

                }
            }

        }

    }

}
?>
