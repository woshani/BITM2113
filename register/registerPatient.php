<!DOCTYPE html>
<?php
  include "../connection/connection.php";
  session_start();
  if(!isset($_SESSION['userid']))
  {
      header("Location: ../index.html");
      exit;
  } 
?>
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

   <img src="#"/>
   <p class="text_format"> WELCOME <b><?php echo $_SESSION['full_name']; ?></b> </p>
   <p class="text_format"><?php echo $_SESSION['role'];?></p>
   <button> MANAGE ACCOUNT</button>
   <a href="../mainmenu.php"><button>HOME</button></a>
   <a href="../out.php"><button> LOG OUT</button></a>

 </div>

 <div class="container" >
   <form action="registerFunction.php" class="register" class="text_format" name="myForm" onsubmit="return validateForm()" method="post">
      <table class="tbl_in_consult">
        <tr>
          <td>Matric/Staff No *:</td>
          <td class="text_align_left"><input type="text" name="matric" placeholder="" maxlength="10" style="width: 200px;" required=""></td>
        </tr>
        <tr>
          <td>IC/Passport *:</td>
          <td class="text_align_left"><input type="text" name="ic" placeholder="" maxlength="12" style="width: 200px;" required=""></td>
        </tr>
        <tr>
          <td>Full Name *:</td>
          <td class="text_align_left"><input type="text" name="fullname" placeholder="" style="width: 200px;" required=""></td>
        </tr>
        <tr>
          <td>Age *:</td>
          <td class="text_align_left"><input type="text" name="age" placeholder="" maxlength="2" style="width: 200px;" required=""></td>
        </tr>
        <tr>
          <td>Gender *:</td>
					<td><select class="text_align_left" name="gender" id="gender" value="" style="width: 205px;" required="">
						<option value="" selected="" disabled="">select</option>
						<option value="female">Female</option>
						<option value="male">Male</option>
					</select></td>
				</tr>
        </tr>
        <tr>
          <td>Address:</td>
          <td class="text_align_left"><textarea name="address" placeholder="" style="width: 200px;"></textarea></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td class="text_align_left"><input type="email" name="email" placeholder="" style="width: 200px;"></td>
        </tr>
        <tr>
          <td><input type="submit" value="Submit" class="button" style="margin-left: 79px;" onclick="validate()"></td>
          <td><input type="reset" value="Reset" class="button" style="margin-left: 28px;"></td>
        </tr>

      </table>
    </form>
 </div>
 </body>
 </html>
