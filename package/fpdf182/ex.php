<?php
require('code128.php');

$pdf = new PDF_Code128('P','mm',array(100,150));
//$pdf=new PDF_Code128();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

//A set
$code='CODE 128';
$pdf->SetXY(20,15);
$pdf->Write(5,'A set: "'.$code.'"');
$pdf->Code128(20,20,$code,50,20);
$pdf->SetXY(20,40);
$pdf->Write(5,'A set: "'.$code.'"');

//$pdf->AddPage();
//$code='CODE 128';
//$pdf->SetXY(20,15);
//$pdf->Write(5,'A set: "'.$code.'"');
//$pdf->Code128(20,20,$code,50,20);
//$pdf->SetXY(20,40);
//$pdf->Write(5,'A set: "'.$code.'"');



$pdf->Output();
?>
