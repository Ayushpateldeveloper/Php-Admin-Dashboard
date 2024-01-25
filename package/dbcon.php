<?php 
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
// Define a page using all default values except "L" for Landscape orientation
	//$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);



?>