<?php 
session_start();
include "../connection/connection.php";
$medid = $_POST['medvalue'];
$quantity = $_POST['quantity'];
$complaint = $_POST['complaint'];
$comment = $_POST['commments'];
$drugs = $_POST['drugs'];
$count = rand (0 , 9999999 );
$today = date("Ymd");
$gen = $today.$count;

$sql = "INSERT INTO consultation (consult_id,med_id,consultation_notes,user_id) values('".$gen."','".$medid."','".$complaint."','".$_SESSION['userid']."');";
$sql .= "INSERT INTO drug_prescription(consult_id,drug_id,quantity,notes) values('".$gen."','".$drugs."','".$quantity."','".$comment."');";
$sql .= "UPDATE patient SET status = 'Consulted' WHERE med_id =".$medid.";";
$result = mysqli_multi_query($conn,$sql);
if($result){
		echo "<script>alert('Notes Saved!');location='index.php';</script>";
	}else{
		echo "<script>alert('Failed To Save!');location='index.php';</script>";
	}
?>