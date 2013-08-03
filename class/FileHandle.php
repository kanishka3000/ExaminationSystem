<?php
/**
 * Description of FileHandle
 *
 * @author Kanishka
 */
class FileHandle {
   public $handle;
   public $date;
   
   public function FileHandle(){
       $this->handle=fopen("../Reports/Log.txt","a");
       $this->date=date(DATE_RFC2822);


   }
   public function __destruct(){
       fclose($this->handle);
   }
   public function setText($text){
       $tex="$this->date--".$text."\n";
       if(fwrite($this->handle, $tex)){

           return true;
       }else{
           return false;
       }
   }
}
?>
