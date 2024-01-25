<?php
// Include the PDF class
require_once "../package/TCPDF-main/tcpdf.php";
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
      // Connecting with database
    }
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        //$this->SetY(-15);
        // Set font
        //$this->SetFont('helvetica', 'I', 8);
        /*$this->Cell(0, 10, '**This Is Computer Generated PO Signature Is Not Required**', 0, false, 'C', 0, '', 0, false, 'T', 'M');*/
        // Page number
        //$this->Cell(0, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// $pageLayout = array(400, 400);
// create new PDF document
$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('User-data');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 1, 5); //top, bottom, right
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 2);
$pdf->AddPage();
// Logo          
            date_default_timezone_set('Asia/Kolkata');

            include '../includes/dbcon.php';
            $curDate = date('Y-m-d');
            $img_path = "http://localhost/Php-Admin-Dashboard/pages/Profile_photo/";
            $id = $_GET['id'];
            $sql = "SELECT * FROM user_data WHERE id = '93'";
            $result = sqlsrv_query($Con, $sql);
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            
           
    $output1='<img src="Profile_photo/'.$row['profile_image'].'" height="150px" width="150px">';
    $pdf->SetFont("times", "A", 12);           
    $pdf->SetY(5);
    $pdf->SetX(5);
    $pdf->writeHTML($output1, true, false, false, false, 'C');

    // $image_file = 'Profile_photo/'.$row['profile_image'];
    // $pdf->Image($image_file, 180, 2, 24, 24, '', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
          
    $output .= '<table style="width:100%; border: 0.2px solid black;">';
      $output .= '<tr>';
        $output .= '<th style=" border-top: 0.2px solid black; height:17px;" align="right">Date :</th>';
        $output .= '<td style=" border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px;">'. $curDate .'</td>';
      $output .= '</tr>';
      $output .= '<tr>';
        $output .= '<th style=" border-top: 0.2px solid black; height:17px" align="right">First name. :</th>';
        $output .= '<td style=" border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px">'. $row["first_name"] .'</td>';
      $output .= '</tr>';
      $output .= '<tr>';
        $output .= '<th style=" border-top: 0.2px solid black; height:17px" align="right">Last Name :</th>';
        $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px">'. $row["last_name"] .'</td>';
      $output .= '</tr>';
      $output .= '<tr>';
        $output .= '<th style="border-top: 0.2px solid black; height:17px" align="right">Education :</th>';
        $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px">'. $row["education"] .'</td>';
      $output .= '</tr>';
      $output .= '<tr>';
        $output .= '<th style="border-top: 0.2px solid black; height:17px" align="right">Company Name :</th>';
        $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px">'. $row["company_name"] .'</td>';
      $output .= '</tr>';   
      $output .= '<tr>';
        $output .= '<th style=" border-top:  0.2px solid black; height:17px" align="right">Address :</th>';
        $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px">'. $row["address"] .'</td>';
      $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<th style="border-top: 0.2px solid black; height:17px" align="right">Person To Meet:</th>';
        $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px">'. $row["personToMeet"] .'</td>';
      $output .= '</tr>';
      
      $output .= '<tr>';
        $output .= '<th style=" border-top:  0.2px solid black; height:17px" align="right">Time Officer Name :</th>';
        $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px">'. $row["timeOfficerName"] .'</td>';
      $output .= '</tr>';
$output .= '</table> <br><br>';


$pdf->SetFont("times", "A", 12);           
$pdf->SetY(67);
$pdf->SetX(5);
$pdf->writeHTML($output, true, false, false, false, 'C');

$pdf->SetFont("helvetica", "", 12);
$pdf->SetY(125);
$pdf->SetX(10);
$pdf->Cell(0, 20, "Signature (visitor)");
$pdf->SetFont("helvetica", "", 12);
$pdf->SetY(133);
$pdf->SetX(10);
$pdf->Cell(0, 25, '______________________');        
$pdf->SetFont("helvetica", "", 12);
$pdf->SetY(125);
$pdf->SetX(105);
$pdf->Cell(0, 20, "Signature (officer)");
$pdf->SetY(133);
$pdf->SetX(105);
$pdf->Cell(0, 25, '______________________');        
 
// Clean any content of the output buffer
ob_end_clean();

//Close and output PDF document
$pdf->Output('user-data.pdf', 'I');


?>