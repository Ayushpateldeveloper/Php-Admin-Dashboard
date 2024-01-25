<?php
// connection from database					
$sid = $_GET['sid'];
include('../includes/dbconhr.php');
$sql="SELECT * from new_joining where id='$sid'";
$run=sqlsrv_query($conhr,$sql);
$row=sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

if ($row['DOJ_Prob'] == NULL) {
	$y = '';
}
else{
	$y = strtoupper($row['DOJ_Prob']->format('d-M-y'));
}

// Include the PDF class
require_once "../package/TCPDF-main/tcpdf.php";
						
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, '**This Is Computer Generated form Signature Is Not Required**', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // Page number
        /*$this->Cell(0, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');*/
    }
}

// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('New_Joining');
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
$pdf->SetMargins(1, PDF_MARGIN_TOP, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage();

	$image_file = 'profile_pic/'.$row['profile_pic'];
    $pdf->Image($image_file, 180, 2, 24, 24, '', '', 'T', false, 300, 'R', false, false, 0, false, false, false);
    $pdf->SetFont('times', 'B', 16);
    $pdf->SetY(4);
    $pdf->SetX(5);
    $pdf->Cell(0, 10, strtoupper($row["cont_name"]).' JOINING FORM', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    $pdf->SetFont("helvetica", "A", 12);
    $pdf->SetY(15);
   	$pdf->Cell(0, 20, '________________________________________________________________________________________');

	// start body design working
	//-----------------FIRST DETAILS-------------------//
	$pdf->SetFont('TIMES', 'B', 11);
	$pdf->SetY(33);
	$pdf->Cell(0, 5, '(A) OFFICE USE ONLY', 0, false, 'C', 0, '', 0, false, 'M', 'M');


	$output='<table width="100%" border="1" cellpadding="4">';
		$output .= '<tr>';
		    $output .= '<td width="50%"><b>EMP ID : </b> '.strtoupper($row["Emp_ID"]).'</td>';
			$output .= '<td width="50%"><b>CATEGORY : </b> '.strtoupper($row["Emp_cat"]).'</td>';
		$output .= '</tr>';
		$output .= '<tr>';
			$output .= '<td><b>DESIGNATION : </b> '.strtoupper($row["Designation"]).'</td>';
			$output .= '<td><b>LOCATION : </b> '.strtoupper($row["Location"]).'</td>';
		$output .= '</tr>';
		$output .= '<tr>';		    
			$output .= '<td><b>DEPARTMENT : </b> '.strtoupper($row["Depnt"]).'</td>';
			$output .= '<td><b>DPNT_SUP : </b> '.strtoupper($row["Dep_Sup"]).'</td>';
		$output .= '</tr>';
		$output .= '<tr>';		    
			$output .= '<td><b>COMPANY : </b> '.strtoupper($row["contractual"]).'</td>';
			$output .= '<td><b>CONTRATOR : </b> '.strtoupper($row["cont_name"]).'</td>';
		$output .= '</tr>';
		$output .= '<tr>';		    
			$output .= '<td width="25%"><b>RATE/CTC : </b> '.$row["rate_ctc"].'</td>';
			$output .= '<td width="25%"><b>Mr No. : </b> '.$row["mrno"].'</td>';
			$output .= '<td width="25%"><b>Cat. : </b> '.strtoupper($row["sub_category"]).'</td>';
			$output .= '<td width="25%"><b>DOJ : </b> '.$y.'</td>';
		$output .= '</tr>';
	$output .= '</table>';

	$pdf->SetFont("helvetica", "A", 9);						
	$pdf->ln();
	$pdf->SetX(6);
	$pdf->writeHTML($output, true, false, false, false, 'L');

	//-----------------SECOND DETAILS-------------------//
	$pdf->SetFont('TIMES', 'B', 11);
	$pdf->Cell(0, 5, '(B) EMPLOYEE PERSONAL DETAILS', 0, false, 'C', 0, '', 0, false, 'M', 'M');


	$output1='<table border="1" cellpadding="4" >';
		$output1 .= '<tr>';
			$output1 .= '<td width="100%"><b>FULL NAME : </b> '.strtoupper($row["F_name"].' '.$row["M_name"].' '.$row["L_name"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td width="50%"><b>DATE OF BIRTH : </b> '.strtoupper($row["Date_of_birth"]->format('d-M-y')).'</td>';
		    $output1 .= '<td width="50%"><b>FATHER / HUSBAND NAME : </b> '.strtoupper($row["Father_husband"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>MOBILE NUMBER : </b> '.strtoupper($row["mobile_no"]).'</td>';
		    $output1 .= '<td><b>EMERGENCY CONTACT : </b> '.strtoupper($row["emergency_con"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>EMAIL ID : </b> '.strtoupper($row["email"]).'</td>';
		    $output1 .= '<td><b>EDUCATION : </b> '.strtoupper($row["education"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>GENDER : </b> '.strtoupper($row["gender"]).'</td>';
		    $output1 .= '<td><b>MARITAL STATUS : </b> '.strtoupper($row["marital_status"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>PREVIOUS WORK EXPIENCE : </b> '.strtoupper($row["pre_work_exp"]).'</td>';
		    $output1 .= '<td><b>DATE OF EXIT : </b> '.strtoupper($row["date_of_exit"]->format('d-M-y')).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
			$output1 .= '<td align="center"><b>CURRENT ADDRESS</b></td>';
			$output1 .= '<td align="center"><b>PERMANENT ADDRESS</b></td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>PINCODE : </b> '.strtoupper($row["c_pincode"]).'</td>';
		    $output1 .= '<td><b>PINCODE : </b> '.strtoupper($row["p_pincode"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>HOUSE / BUILDING : </b> '.strtoupper($row["c_house"]).'</td>';
		    $output1 .= '<td><b>HOUSE / BUILDING : </b> '.strtoupper($row["p_house"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>STREET / VILAGE : </b> '.strtoupper($row["c_street"]).'</td>';
		    $output1 .= '<td><b>STREET / VILAGE : </b> '.strtoupper($row["p_street"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		   	$output1 .= '<td><b>AREA : </b> '.strtoupper($row["c_area"]).'</td>';
		    $output1 .= '<td><b>AREA : </b> '.strtoupper($row["p_area"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
		    $output1 .= '<td><b>STATE : </b> '.strtoupper($row["c_state"]).'</td>';
		    $output1 .= '<td><b>STATE : </b> '.strtoupper($row["p_state"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
			$output1 .= '<td width="33%"><b>BLOOD GROUP : </b> '.strtoupper($row["blood_grop"]).'</td>';
			$output1 .= '<td width="33%"><b>SPECIALLY ABLED : </b> '.strtoupper($row["special_abled"]).'</td>';
			$output1 .= '<td width="34%"><b>CATEGORY (ABLED): </b> '.strtoupper($row["spe_type"]).'</td>';
		$output1 .= '</tr>';
	$output1 .= '</table>';

	$pdf->SetFont("helvetica", "A", 9);
	$pdf->ln();
	$pdf->SetX(6);
	$pdf->writeHTML($output1, true, false, false, false, 'L');

	//-----------------THIRD DETAILS-------------------//
	$pdf->SetFont('TIMES', 'B', 11);
	$pdf->Cell(0, 5, '(C) BANK AND OTHER KEY DETAILS', 0, false, 'C', 0, '', 0, false, 'M', 'M');

	$output1='<table border="1" cellpadding="4" >';
		$output1 .= '<tr>';
			$output1 .= '<td width="50%"><b>AADHAR NO. : </b> '.strtoupper($row["no_of_aadhar"]).'</td>';
		    $output1 .= '<td width="50%"><b>NAME : </b> '.strtoupper($row["name_aadhar"]).'</td>';			   
		$output1 .= '</tr>';
		$output1 .= '<tr>';
			$output1 .= '<td><b>PAN NO. : </b> '.strtoupper($row["no_of_pan"]).'</td>';
		    $output1 .= '<td><b>NAME : </b> '.strtoupper($row["name_pan"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
			$output1 .= '<td><b>BANK A/C NO. : </b> '.strtoupper($row["ac_no"]).'</td>';
		    $output1 .= '<td><b>NAME : </b> '.strtoupper($row["name_as_per_bank"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
			$output1 .= '<td width="100%"><b>IFSC CODE : </b> '.strtoupper($row["IFSC"]).'</td>';
		$output1 .= '</tr>';
		$output1 .= '<tr>';
			$output1 .= '<td width="50%"><b>UAN NUMBER : </b> '.strtoupper($row["UAN"]).'</td>';
		    $output1 .= '<td width="50%"><b>ESIC IP ADDRESS : </b> '.strtoupper($row["ESIC"]).'</td>';
		$output1 .= '</tr>';
	$output1 .= '</table>';

	$pdf->SetFont("helvetica", "A", 9);
	$pdf->ln();
	$pdf->SetX(6);
	$pdf->writeHTML($output1, true, false, false, false, 'L');

	//-----------------FOURTH DETAILS-------------------//			
	$pdf->SetFont('TIMES', 'B', 11);
	$pdf->Cell(0, 5, '(D) FAMILY DETAILS', 0, false, 'C', 0, '', 0, false, 'M', 'M');

	$output2='<table border="1" cellpadding="4" >';
		$output2 .= '<tr>';
			$output2 .= '<th width="13%"><b>RELATION</b></th>';
			$output2 .= '<th width="31%"><b>NAME</b></th>';
			$output2 .= '<th width="13%"><b>DOB</b></th>';
			$output2 .= '<th width="11%"><b>NOMINEE</b></th>';
			$output2 .= '<th width="12%"><b>NOMINEE(%)</b></th>';
			$output2 .= '<th width="20%"><b>AADHAR NO</b></th>';
		$output2 .= '</tr>';

		$sql1="SELECT * from NJ_family_details where iid='$sid'";
		$run1=sqlsrv_query($conhr,$sql1);
		while($row1=sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){

			$output2 .= '<tr>';
				$output2 .= '<td width="13%">'.strtoupper($row1["relationship"]).'</td>';
			    $output2 .= '<td width="31%">'.strtoupper($row1["name"]).'</td>';
			    $output2 .= '<td width="13%">'.strtoupper($row1["DOB"]->format('d-M-y')).'</td>';
			    $output2 .= '<td width="11%">'.strtoupper($row1["nominee"]).'</td>';
			    $output2 .= '<td width="12%">'.strtoupper($row1["nom_per"]).'</td>';
			    $output2 .= '<td width="20%">'.strtoupper($row1["aadhar_no"]).'</td>';
			$output2 .= '</tr>';
		}
	$output2 .= '</table>';

	$pdf->SetFont("helvetica", "A", 9);
	$pdf->ln();
	$pdf->SetX(6);
	$pdf->writeHTML($output2, true, false, false, false, 'C');

	if ($row['shoesHelmet'] == 'Yes') {
		$pdf->AddPage();	

		$pdf->SetFont('times', 'B', 16);
		$pdf->ln(-20);
	    $pdf->SetX(5);
	    $pdf->Cell(0, 0, 'Acquisition and use of Safety Helmet and Shoes', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    $pdf->SetFont("helvetica", "A", 12);
	    $pdf->SetY(5);
	   	$pdf->Cell(0, 20, '________________________________________________________________________________________');

	   	$output1='<table cellpadding="3" >';
			$output1 .= '<tr>';
				$output1 .= '<td width="100%"><b>Date : </b> '.date('d-M-Y').'</td>';			   
			$output1 .= '</tr>';
			$output1 .= '<tr>';
				$output1 .= '<td><b>Employee ID : </b> '.$row["Emp_ID"].'</td>';
			$output1 .= '</tr>';
			$output1 .= '<tr>';
				$output1 .= '<td><b>Employee Name :  </b> '.$row["F_name"].' '.$row["M_name"].' '.$row["L_name"].'</td>';
			$output1 .= '</tr>';
			$output1 .= '<tr>';
				$output1 .= '<td><b>Department : </b> '.$row["Depnt"].'</td>';
			$output1 .= '</tr>';
			$output1 .= '<tr>';
				$output1 .= '<td><b>Phone Number : </b> '.$row["mobile_no"].'</td>';
			$output1 .= '</tr>';
		$output1 .= '</table>';

		$pdf->SetFont("helvetica", "A", 11);
		$pdf->ln();
		$pdf->SetX(6);
		$pdf->writeHTML($output1, true, false, false, false, 'L');

		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->ln();
		$pdf->SetX(6);
		$pdf->Cell(0, 5, 'Allocate Safety Gadgets :');

		$output1 = '
			<ul>
				<li>Safety Helmet</li>
				<li>Safety Shoes</li>
			</ul>
		';

		$pdf->SetFont("helvetica", "A", 11);
		$pdf->ln(8);
		$pdf->writeHTML($output1, true, false, false, false, 'L');

		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->ln(8);
		$pdf->SetX(6);
		$pdf->Cell(0, 5, 'Below are the term and condition for Helmet and Safety Shoes. ');

		$output1 = '
			<ul>
				<li>It is mandatory for every employee to wear helmet and safety shoes while working in plant.</li>
				<li>Eligibility to get these gadgets will be 7 days of continuous present at work place.</li>
				<li>Company will charge the cost of safety gadgets provided as mentioned above in lieu of equivalent to two days of wages/ salary.</li>
				<li>In case of employees complete his one year of services, company will release two days’ salary /wages. </li>
				<li>In no case company will take back the safety gadgets back in their custody.</li>
			</ul>
		';

		$pdf->SetFont("helvetica", "A", 11);
		$pdf->ln(8);
		$pdf->writeHTML($output1, true, false, false, false, 'L');

		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->SetTextColor(255, 17, 0);
		$pdf->ln(8);
		$pdf->SetX(6);
		$pdf->Cell(0, 5, 'I certify that I have read, understand and agree to the terms above and that agree to adhere to them.');

		$pdf->SetTextColor(0, 0, 0);

		$output1='<table cellpadding="8" >';
			$output1 .= '<tr>';
				$output1 .= '<td width="100%"><b>Employee Sign :   </b> ____________________________</td>';			   
			$output1 .= '</tr>';
			$output1 .= '<tr>';
				$output1 .= '<td><b>Approved by : &nbsp;&nbsp;&nbsp;&nbsp;</b> ____________________________</td>';
			$output1 .= '</tr>';
		$output1 .= '</table>';

		$pdf->SetFont("helvetica", "A", 10);
		$pdf->ln(10);
		$pdf->SetX(3);
		$pdf->writeHTML($output1, true, false, false, false, 'L');

	}


//Close and output PDF document
$pdf->Output('JOININGform.pdf', 'I');

?>