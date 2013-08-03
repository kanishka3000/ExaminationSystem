<?php


/**
 * Description of News
 *create table News(Nid int(10) primary key auto_increment,Date date,item varchar(100));
 * @author Kanishka
 */
require_once('Connection.php');
class News {
    //public $news;
    public $NID;
    public $Date;
    public $Item;
    public function getNews(){

    }
    public function setNewsItems(){
        $news;
        $query="select * from News ";
        $result=Connection::connect($query);
        while($row=mysql_fetch_array($result)){
            $new=new News();
            $nid=$row['Nid'];
            $new->Date=$row['Date'];
            $new->Item=$row['item'];
            $new->NID=$nid;
            $news["$nid"]=$new;
        }
        #sample
        if(Connection::$affectedrows!=0){
             return $news;
        }
        else{
            return false;
        }
       
    }
    public function saveNews(){
$query="insert into News(Date,item) values('$this->Date','$this->Item')";
$result=Connection::connect($query);

    }
    public function removeNews(){
        $query="delete from News";
        Connection::connect($query);
        if(Connection::$affectedrows!=0){
            return true;
        }
        else{
          return false;
        }
    }

}
?>
