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

  <title> Main Menu </title>
</head>

<body>
  <div class="topnav">
    <h1> Report </h1>
    <br/>
 </div>

 <div class="sidenav">

   <img src="#"/>
   <p class="text_format"> WELCOME <b><?php echo $_SESSION['full_name']; ?></b> </p>
   <p class="text_format"><?php echo $_SESSION['role'];?></p>
<!--    <button> MANAGE ACCOUNT</button>
 -->   <a href="../mainmenu.php"><button>HOME</button></a>
       <a href="../out.php"><button> LOG OUT</button></a>
 </div>

 <div class="container">
  <form action="report.php" method="post">
    <input type="date" name="startdate" placeholder="select start date">
    <input type="date" name="enddate" placeholder="select end date">
    <input type="submit" name="search" class="" value="GENERATE">
  </form>
 </div>


 </body>
 </html>
