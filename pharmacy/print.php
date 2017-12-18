<?php
require('fpdf.php');


class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('utem.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,'RECEIPT',1,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(50,10,'Matric No:');
	$pdf->Cell(0,10,($_GET["matricno"]));
	$pdf->Ln(10);
	$pdf->Cell(50,10,'Full Name:');
		$pdf->Cell(0,10,($_GET["full_name"]));
		$pdf->Ln(10);
		$pdf->Cell(50,10,'Medicine:');
			$pdf->Cell(0,10,($_GET["drug_name"]));
			$pdf->Ln(10);
			$pdf->Cell(50,10,'Notes:');
				$pdf->Cell(0,10,($_GET["notes"]));
				$pdf->Ln(30);
				$pdf->Cell(0,100,'e-clinic University Teknikal Malaysia Melaka | 2017');
$pdf->Output();
?>

<?php


include "../connection/connection.php";
session_start();
if(!isset($_SESSION['userid']))
{
    header("Location: ../index.php");
    exit;
}

  

$sql = "UPDATE drug_prescription SET status = 'Dispense' WHERE consult_id = '".$_GET["consult_id"]."'";
$result = mysqli_multi_query($conn,$sql);
if($result){
		
	}else{
		
	}


?>