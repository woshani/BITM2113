<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['userid']))
{
    header("Location: index.php");
    exit;
} 
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">

  <title> Main Menu </title>
  <?php
  			switch ($_SESSION['role']) {
			    case "Doctor":
			        echo "<style type='text/css'>#register{display:none;}</style>";
			        echo "<style type='text/css'>#pharmacy{display:none;}</style>";
			        echo "<style type='text/css'>#consultation{display:block;}</style>";
			        echo "<style type='text/css'>#report{display:none;}</style>";
			        break;
			    case "Nurse":
			        echo "<style type='text/css'>#register{display:block;}</style>";
			        echo "<style type='text/css'>#pharmacy{display:none;}</style>";
			        echo "<style type='text/css'>#consultation{display:none;}</style>";
			        echo "<style type='text/css'>#report{display:none;}</style>";
			        break;
			    case "Pharmacy":
			        echo "<style type='text/css'>#register{display:none;}</style>";
			        echo "<style type='text/css'>#pharmacy{display:block;}</style>";
			        echo "<style type='text/css'>#consultation{display:none;}</style>";
			        echo "<style type='text/css'>#report{display:block;}</style>";
			        break;
			} 
  		?>
</head>

<body>
  <div class="topnav">
		<h1>Main Menu </h1>
    <br/>
 </div>

 <div class="sidenav">

   <img src="#"/>
   <p class="text_format"> WELCOME <b><?php echo $_SESSION['full_name']; ?></b> </p>
   <p class="text_format"><?php echo $_SESSION['role'];?></p>
   <!-- <button> MANAGE ACCOUNT</button> -->

   <a href="out.php"><button> LOG OUT</button></a>

 </div>

  <div class="mainmenu">
  		
			<a href="register/registerPatient.php" id="register">
			<div class="box1">
				<p> REGISTER PATIENT </p>
			</div>
		</a>

			<a href="consultation/index.php" id="consultation">
			<div class="box1">
				<p>CONSULTATION</p>
			</div>
		</a>

			<a href="pharmacy/index.php" id="pharmacy">
			<div class="box1">
				<p> PHARMACY </p>
			</div>
		</a>

		<a href="report/registerPatient.php" id="report">
			<div class="box1">
				<p> GENERATE REPORT </p>
			</div>
		</a>
		</div>
</body>
</html>
