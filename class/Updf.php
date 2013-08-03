<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Updf
 *
 * @author Kanishka
 */
require_once("pdf/fpdf.php");
class Updf extends FPDF{
    public $SetFoot=false;
    public $Avals=0;
    public $Bvals=0;
    public $Cvals=0;
    public $Dvals=0;
    public $Evals=0;
    public function setGrades($As,$Bs,$Cs,$Ds,$Es){
        $this->Avals=$As;
        $this->Bvals=$Bs;
        $this->Cvals=$Cs;
        $this->Dvals=$Ds;
        $this->Evals=$Es;
    }
    function Header()
    {
        if($this->PageNo()!=1){

            $this->Image('../images/topbannebwr.gif',10,8,190);
            //Arial bold 15
            $this->SetFont('Arial','B',15);
            //    //Move to the right
            $this->Cell(80);
            //Title
            //    $this->Cell(30,10,'Exam Report',0,0,'C');
            //    //Line break
            $this->Ln(20);

            $this->Ln(20);

        }
        else{
            //Arial bold 15
            $this->SetFont('Arial','BU',18);
            //    //Move to the right
            $this->Cell(80);
            //Title
            $this->Cell(30,10,'Examination Report',0,0,'C');
            //    //Line break
            $this->Ln(20);
            $this->Ln(20);
            $da=date(DATE_RFC2822);
            $this->Ln(20);

            $this->SetFont('Arial','B',11);
            $this->MultiCell(160, 8, "Report genarated on $da");
        }

        //Logo

    }


    function Footer()
    {
        if($this->PageNo()==1){
            //Position at 1.5 cm from bottom
            $this->SetY(-60);
            //Arial italic 8
            $this->SetFont('Arial','I',8);

            $this->Image('../images/ucsc.jpg',10,10);
            $this->Cell(100, 10,"System analysis and Design Project ICT-2007ICT ");
            $this->Ln();
            $this->Cell(100, 10,"info-07020742@std.ucsc.cmb.ac.lk");

            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }else{
            $this->SetY(-60);
            if($this->SetFoot){
                $this->Cell(200,6,"Ms. AS Jayaratne");
                $this->Ln();
                $this->Cell(200,6,"Asst.Registar/Examination");
                $head=array("key to gradings","no of gradings");
                $body=array(array("A-70%or more",$this->Avals),array("B-55%or more",$this->Bvals),array("C-40%or more",$this->Cvals),array("D-30%or more",$this->Dvals),array("E-29 or less",$this->Evals));
                $this->InnerTable($head, $body);
                //$this->Cell(200, 10, "Key to gradings");
                // $this->Cell(200,10, No of)
            }
        }
    }
    function BasicTable($header,$data)
    {
        //Header
        $k=0;
        foreach($header as $col){
            $this->SetFont("Arial", "BI", 14);
            if($k==1){
                $this->Cell(90,6,$col,0,0,'C');
            }elseif($k==3){
                  $this->Cell(60,6,$col,0,0,'C');
                
            }else{
                $this->Cell(15,6,$col,0,0,'C');
            }



            $k++;
        }
        $this->Ln();
        //Data
        $this->SetFont("Times", "", 12);
        if(is_array($data)){
            foreach($data as $row)
            {$j=0;
                foreach($row as $col){
                    if($j==1){
                        $this->Cell(90,5,$col,1,0,'L');
                    }elseif($j==3){
                          $this->Cell(60,5,$col,1,0,'L');
                    }else{
                        $this->Cell(15,5,$col,1,0,'L');
                    }

                    $j++;
                }
                $this->Ln();
            }
        }
    }
     function BasicTable2($header,$data)
    {
        //Header
        $k=0;
        foreach($header as $col){
            $this->SetFont("Arial", "I", 12);
            if($k==1||$k==3){
                $this->Cell(40,6,$col,0,0,'C');
            }else{
                $this->Cell(15,7,$col,0,0,'C');
            }



            $k++;
        }
        $this->Ln();
        //Data
        $this->SetFont("Times", "", 12);
        if(is_array($data)){
            foreach($data as $row)
            {$j=0;
                foreach($row as $col){
                    if($j==1||$j==3){ $this->Cell(40,5,$col,1,0,'L');
                    }else{
                        $this->Cell(15,5,$col,1,0,'L');
                    }

                    $j++;
                }
                $this->Ln();
            }
        }
    }

    function BasicTableData($header,$data)
    {
        //Header

        foreach($row as $col)
        $this->Cell(40,6,$col,1);
        $this->Ln();
    }

    function setFoodter($set){
        $this->SetFoot=$set;

    }
    function InnerTable($header,$data){
        $k=0;
        foreach($header as $col){
            $this->SetFont("Times", "BI", 11);
            if($k==1||$k==3){
                $this->Cell(40,7,$col,0,0,'C');
            }else{
                $this->Cell(15,7,$col,0,0,'C');
            }



            $k++;
        }
        $this->Ln();
        //Data
        $this->SetFont("Times", "", 12);
        if(is_array($data)){
            foreach($data as $row)
            {$j=0;
                foreach($row as $col){
                    if($j==0){ $this->Cell(40,4,$col,0,0,'L');
                    }else{
                        $this->Cell(15,4,$col,0,0,'L');
                    }

                    $j++;
                }
                $this->Ln();
            }
        }

    }
function NormalTable($header,$data){
     $k=0;
        foreach($header as $col){
            $this->SetFont("Times", "BI", 11);
            if($k==0||$k==1){
                $this->Cell(50,4,$col,0,0,'L');
            }else{
                $this->Cell(25,4,$col,0,0,'L');
            }



            $k++;
        }
        $this->Ln();
        //Data
        $this->SetFont("Times", "", 12);
        if(is_array($data)){
            foreach($data as $row)
            {$j=0;
                foreach($row as $col){
                    if($j==1||$j==0){ $this->Cell(50,4,$col,0,0,'L');
                    }else{
                        $this->Cell(25,4,$col,0,0,'L');
                    }

                    $j++;
                }
                $this->Ln();
            }
        }
}


}
?>
