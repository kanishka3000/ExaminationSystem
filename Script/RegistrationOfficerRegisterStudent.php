<?php
session_start();
require_once("../class/Student.php");
if(isset($_REQUEST['RegistrationId'])){


$student=new Student();
$student->RegistrationNo=$_POST['RegistrationId'];
$student->Name=$_REQUEST['fname'];
$student->nationalid="0";
$student->Address=$_REQUEST['address'];
$student->Address2=$_REQUEST['paddress'];
$student->Telephone=$_REQUEST['ptelephone'];
$student->Mobile=$_REQUEST['mphone'];
$student->Nationality=$_POST['nationality'];
$student->School=$_POST['school'];
$student->University=$_POST['university'];
$student->job=$_POST['occupation'];
//print_r($student);
//saving the photo location
if($_FILES['photo']['size']!=0){
//check image size
$destination="../images/student/$student->nationalid.jpg";
$destination2="images/student/$student->nationalid.jpg";
move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
$student->Photo="$destination2";
//echo $destination;
//print_r($student);
}
else{
$student->Photo="images/student/IHRA.jpg";     
}
try{
$student->saveStudent();
}
catch(Exception $e){
    echo $e->getMessage();
}
$_SESSION['student']=serialize($student);
header("location:../Confirmation/RegistrationOfficerRegisterStudent.php");
}

?>
