<?php
  include "../connection/connection.php";
  session_start();
  if(!isset($_SESSION['userid']))
  {
      header("Location: ../index.php");
      exit;
  } 
?>
<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">

  <title class="text_format"> Main Menu </title>
</head>

<body>
  <div class="topnav">
    <h1 class="text_format"> OUTPATIENT REGISTRATION </h1>
    <br/>
 </div>

 <div class="sidenav">

   <img src="IMG/sitipic.png"/>
   <p class="text_format"> WELCOME <b><?php echo $_SESSION['full_name']; ?></b> </p>
   <p class="text_format"><?php echo $_SESSION['role'];?></p>
<!--    <button> MANAGE ACCOUNT</button>
 -->   <a href="../mainmenu.php"><button>HOME</button></a>
   <a href="../out.php"><button> LOG OUT</button></a>
 </div>

 <div class="container" >
   <form action="registerPatient.html" class="register" class="text_format">
    <h3 class="text_format">Search Patient</h3>
      <input type="text" name="search_patient" id="search_patient" placeholder="patient ic/passport number">
      <input type="submit" name="btn_search" id="btn_search" class="button" value="search">
    </form>

 </div>


 </body>
 </html>
