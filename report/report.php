<?php include "../connection/connection.php";
$start = $_POST['startdate'];
$end = $_POST['enddate'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>REPORT</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
	<div style="width: 50%; margin: 0 auto;">
		<h1>UTeM E-Clinic</h1>
		<h2>Report By Date From <?php echo $start; ?> To <?php echo $end; ?></h2>
		<table class="tbl">
			<tr>
				<th>Top Drug</th>
				<th>Quantity</th>
			</tr>
			<?php
				$sql="select sum(drug_prescription.quantity) as xx,drug.drug_name
						from drug_prescription
						join drug on drug.drug_id = drug_prescription.drug_id 
						where DATE_FORMAT(drug_prescription.date_prescribe,'%Y-%m-%d') BETWEEN '$start' and '$end'
						group by drug_prescription.drug_id order by xx desc limit 1"; 
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
			?>
			<tr>
				<td><?php echo $row['drug_name']; ?></td>
				<td><?php echo $row['xx']; ?></td>
			</tr>
		</table>
		<br/>
		<table class="tbl">
			<tr>
				<th>Gender Most Consulted</th>
				<th>Total</th>
			</tr>
			<?php
				$sql2="select count(gender) as xx,gender from patient where DATE_FORMAT(patient.date_in,'%Y-%m-%d') BETWEEN '$start' and '$end' group by patient.gender order by xx desc limit 1;"; 
				$result2 = mysqli_query($conn,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
			?>
			<tr>
				<td><?php switch($row2['gender']){
					case "m":
						echo "MALE";
						break;
					case "f":
						echo "FEMALE";
						break;
				}?></td>
				<td><?php echo $row2['xx']; ?></td>
			</tr>
		</table>
	</div>
	<div id="buttonketakperint" style="width: 50%; margin: 0 auto;">
		<center><button onclick="prin()">Print</button></center>
	</div>
	<script type="text/javascript">
		function prin(){
			var id = document.getElementById("buttonketakperint");
			id.style.visibility = 'hidden';
			window.print();
			id.style.visibility = 'visible';
		}
	</script>
</body>
</html>