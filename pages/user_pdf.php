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
$pdf->SetMargins(5, 1, 5); //top, bottom, center
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
            $sql = "SELECT * FROM user_data WHERE id = '$id'";
            $result = sqlsrv_query($Con, $sql);
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            
           
            $output1 = '<div style="text-align: center;"><img src="Profile_photo/' . $row['profile_image'] . '" height="150px" width="150px" style="border-radius: 50%;"></div>';
            $pdf->SetFont("times", "A", 12);
            $pdf->SetY(5);
            $pdf->SetX(5);
            $pdf->writeHTML($output1, true, false, false, false, 'C');
            
            $output = '<div style="margin-left: 20%;">';
            $output .= '<table border="1">';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px; background-color:#1ddbd5; color:#ffffff " align="center">Date </th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px; " align="left">' . $curDate . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px; background-color:#1ddb82; colo" align="center">First name</th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["first_name"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center" >Middle name</th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["middle_name"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center">Last name</th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["last_name"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center">Education </th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["education"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center">Designation </th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["designation"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center">Contact Number </th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["contact_number"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center">Email Id </th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row["email_id"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top:  0.2px solid black; height:17px" align="center">Address </th>';
            $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px" align="left">' . $row["address"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top: 0.2px solid black; height:17px" align="center">Date of Joining</th>';
            $output .= '<td style="border-top: 0.2px solid black; border-left: 0.2px solid black; height:17px" align="left">' . $row['date_of_joining']->format('Y-m-d') . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top:  0.2px solid black; height:17px" align="center">Birthdate</th>';
            $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px" align="left">' . $row['birthdate']->format('Y-m-d') . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top:  0.2px solid black; height:17px" align="center">Gender</th>';
            $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px" align="left">' . $row["gender"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top:  0.2px solid black; height:17px" align="center">martial Status </th>';
            $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px" align="left">' . $row["martial_status"] . '</td>';
            $output .= '</tr>';
            $output .= '<tr>';
            $output .= '<th style="border-top:  0.2px solid black; height:17px" align="center">Salary </th>';
            $output .= '<td style="border-top:  0.2px solid black; border-left:  0.2px solid black; height:17px" align="left">' . $row["salary"] . '</td>';
            $output .= '</tr>';
            $output .= '</table> </div><br><br>';

        $pdf->SetFont("times", "A", 12);           
        $pdf->SetY(67);
        $pdf->SetX(5);
        $pdf->writeHTML($output, true, false, false, false, 'C');

      

$pdf->SetFont("helvetica", "", 12);
$pdf->ln(5);
$pdf->SetX(10);
$pdf->Cell(0, 20, "Signature (visitor)");
$pdf->SetFont("helvetica", "", 12);
$pdf->ln(5);
$pdf->SetX(10);
$pdf->Cell(0, 25, '______________________');        
$pdf->SetFont("helvetica", "", 12);
$pdf->ln(-5);
$pdf->SetX(168);
$pdf->Cell(0, 20, "Signature (officer)");
$pdf->ln(5);
$pdf->SetX(150);
$pdf->Cell(0, 25, '______________________');        
 
// Clean any content of the output buffer
ob_end_clean();

//Close and output PDF document
$pdf->Output($row["first_name"] .'-resume.pdf', 'I');


?>