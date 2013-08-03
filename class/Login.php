<?php

/**
 * Description of Login
 *
 * @author Kanishka
 */
require_once("Connection.php");
class Login {
    public $UserName;
    public $Name;
    public $Address;
    public $Tpno;
    public $Password;
    public $AccessLevel;
    public $Nic;
    public function checkUser($UserName,$Password){
       // if($UserName=='e'){
     //   $query="select * from User where UserName='$UserName'and Password='$Password' and Name='$Name'";
     //   }
     //   else{
        $query="select * from User where UserName='$UserName'and Password='$Password'";
    //    }
        $result=Connection::connect($query);
        if(Connection::$affectedrows==1){
            $u=new Login();
            $row=mysql_fetch_array($result);
            $u->UserName=$row['UserName'];
            $u->Password=$row['Password'];
            $u->Name=$row['Name'];
            $u->Address=$row['Address'];
            $u->Tpno=$row['tpno'];
            $u->AccessLevel=$row['AccessLevel'];
            $u->Nic=$row['Nic'];
            return $u;
        }
        else{
            return false;
        }
        ###

    }
    public function setUser(){
        $query="insert into User values('$this->UserName','$this->Password','$this->Name','$this->Address','$this->Tpno','$this->Nic','$this->AccessLevel')";
        Connection::connect($query);
        if(Connection::$affectedrows!=1){
            return false;
        }
        else{
            return true;
        }

    }
    public function getUsers(){
        $query="select * from User";
        $result=Connection::connect($query);
        $users;
        while($row=mysql_fetch_array($result)){
            $u=new Login();
            $usern=$row['UserName'];
            $u->UserName=$usern;
            $u->Password=$row['Password'];
            $u->AccessLevel=$row['AccessLevel'];
            $users["$usern"]=$u;
        }
        if(Connection::$affectedrows!=0){
            return $users;
        }
        else{
            return false;
        }



    }
    public function removeUser(){
        $query="delete from User where UserName='$this->UserName'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
            return false;
        }


    }
    public function changePassword($UserName,$OldPassword,$NewPassword){
        $query="update User set Password='$NewPassword' where UserName='$this->UserName' and Password='$this->Password'";
        $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
            return false;
        }
    }
    public function checkUsername($username){
        $query="select * from User where UserName='$username'";
         $result=Connection::connect($query);

        if(Connection::$affectedrows!=0){
       

            return true;
        }
        else{
            return false;
        }
    }
	  public function checkCourse($username){
        $query="select * from activecourse where Ac_id='$username'";
         $result=Connection::connect($query);

        if(Connection::$affectedrows!=0){
       

            return true;
        }
        else{
            return false;
        }
    }
		  public function checkExam($username){
        $query="select * from examination where Exa_id='$username'";
         $result=Connection::connect($query);

        if(Connection::$affectedrows!=0){
       

            return true;
        }
        else{
            return false;
        }
    }
    public function countExoficers($usertype){
     $query="select * from User where AccessLevel='$$usertype'";
     $result=Connection::connect($query);
        if(Connection::$affectedrows<5){
            return true;
        }
        else{
            return false;
        }
    }
    public function countRegoficers($usertype){
     $query="select * from User where AccessLevel='$usertype'";
     $result=Connection::connect($query);
        if(Connection::$affectedrows<2){
            return true;
        }
        else{
            return false;
        }
    }
	 public function checkRegNo($usertype){
     $query="select * from student where RegistrationId='$usertype'";
     $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
            return false;
        }
    }
 public function checkRegidR($usertype){
     $query="select * from register where RegistrationId='$usertype'";
     $result=Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
            return false;
        }
    }


}
?>
