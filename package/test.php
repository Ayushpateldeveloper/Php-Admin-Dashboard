<?php
$html='<table align="center" border="1" style="width:80%; margin-top:10px;" >
<tr class="bg-dark text-white text-center">
<th>Name</th>
<th>class</th>
<th>city</th>
<th>address</th>
</tr>					
	<tr class="text-center">
			<td>Ramesh</td>
			<td>6</td>
			<td>Delhi</td>
			<td>new delhi phase-1</td>
			
	</tr>					
	<tr class="text-center">
			<td>Suresh</td>
			<td>12</td>
			<td>mumbai</td>
			<td>new delhi phase-2</td>
	</tr>
</table>';
require_once __DIR__ . '/vendor/autoload.php';
/*$mpdf = new \Mpdf\Mpdf();*/
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$mpdf->WriteHTML($html);
$mpdf->Output('mypdf.pdf','D');
?>
