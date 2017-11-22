<?php
	include "../connection/connection.php";
	$sql = "INSERT INTO patient(ic_number,matricNo,full_name,gender,age,address,email) VALUES('".$_POST['ic']."','".$_POST['matric']."','".$_POST['fullname']."','".$_POST['gender']."','".$_POST['age']."','".$_POST['address']."','".$_POST['email']."');";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('Patient Successfully registered!');location='registerPatient.php';</script>";
	}else{
		echo "<script>alert('Patient Failed to register!');location='registerPatient.php';</script>";
	}
?>