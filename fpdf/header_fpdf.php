<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

class PDF extends FPDF{
//////////////////////////////////////////////////////////////////////////////////////////////

   function CheckPageBreak($h){
     //If the height h would cause an overflow, add a new page immediately
     if($this->GetY()+$h>$this->PageBreakTrigger)
         $this->AddPage($this->CurOrientation);
   }
  
  //Configura��o da tabela
   var $widths;
   var $aligns;
   
   function SetWidths($w){
     //Set the array of column widths
     $this->widths=$w;
   }
 
   function SetAligns($a){
     //Set the array of column alignments
     $this->aligns=$a;
   }
 
   function Row($data){
     //Calculate the height of the row
     $nb=0;
     for($i=0;$i< count($data);$i++)
         $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
     $h=6*$nb;
     //Issue a page break first if needed
     $this->CheckPageBreak($h);
     //Draw the cells of the row
     //descricao da tabela
     for($i=0;$i< count($data);$i++)
     {
         $w=$this->widths[$i];
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
         //Save the current position
         $x=$this->GetX();
         $y=$this->GetY();
         //Draw the border
         $this->Rect($x,$y,$w,$h);
         //Print the text
         $this->MultiCell($w,6,$data[$i],0,$a);
         //Put the position to the right of the cell
         $this->SetXY($x+$w,$y);
     }

     
     //Go to the next line
     $this->Ln($h);
   }
  
   function NbLines($w,$txt){
     //Computes the number of lines a MultiCell of width w will take
     $cw=&$this->CurrentFont['cw'];
     if($w==0)
         $w=$this->w-$this->rMargin-$this->x;
     $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
     $s=str_replace("\r",'',$txt);
     $nb=strlen($s);
     if($nb>0 and $s[$nb-1]=="\n")
         $nb--;
     $sep=-1;
     $i=0;
     $j=0;
     $l=0;
     $nl=1;
     while($i<$nb)
     {
         $c=$s[$i];
         if($c=="\n")
         {
             $i++;
             $sep=-1;
             $j=$i;
             $l=0;
             $nl++;
             continue;
         }
         if($c==' ')
             $sep=$i;
         $l+=$cw[$c];
         if($l>$wmax)
         {
             if($sep==-1)
             {
                 if($i==$j)
                     $i++;
             }
             else
                 $i=$sep+1;
             $sep=-1;
             $j=$i;
             $l=0;
             $nl++;
         }
         else
             $i++;
     }
     return $nl;
   }

    public function Dados_Header($titulo, $array_label, $array_widht){
        
        $this->titulo=$titulo;
        $this->array_label=$array_label;
        $this->array_widht=$array_widht;
    }
    
//////////////////////////////////////////////////////////////////////////////////////////////
//Page header
function Header()
{
    //Logo

    $this->SetFont('Arial','B',10);
    $this->SetTextColor(25,25,112); 

    $this-> image('../_lib/report/img/logo.jpg',10,6,30,'');
    $this->Sety(6);
    $this->SetX(42);
    $this->SetFont('Arial','B',24); 
    $this->Cell(0,6,utf8_encode($this->titulo),0,1,'C','');
    $this->Sety(20);
    $this->Ln(2);
    $this->SetFillColor(246,246,246);

    $this->SetFont('Arial','B',10); 
    
    $this->Line(10, 22, 287, 22);
    $this->Ln();

    for($i = 0; $i < count($this->array_label); $i++){

        $this->Cell($this->array_widht[$i],6,($this->array_label[$i]),1,0,'C', $fill = true);
    }
    $this->Ln();
    
    
}

//Page footer
function Footer()
{   
 
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
   
    $this->SetY(-6);
    $this->SetTextColor(205,205,205);
    $this->SetFont('Arial','B',8);
    
    //Page number
    
    $this->Cell(0,6,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
}

   }
?>