<!DOCTYPE html>
<?php
  include "../connection/connection.php";
  session_start();
  if(!isset($_SESSION['userid']))
  {
      header("Location: ../index.php");
      exit;
  }
  $medid = $_POST['medID'];
  $sql = "select med_id,ic_number,matricNo,full_name,gender,age,address,email,date_in,status from patient WHERE med_id='".$medid."'"; 
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">

  <title> Main Menu </title>
</head>

<body>
  <div class="topnav">
    <h1 class="text_format"> Patient Consultation </h1>
    <br/>
 </div>

 <div class="sidenav">

   <img src="#"/>
   <p class="text_format"> WELCOME <b><?php echo $_SESSION['full_name']; ?></b> </p>
   <p class="text_format"><?php echo $_SESSION['role'];?></p>
   <a href="../mainmenu.php"><button>HOME</button></a>
   <a href="../out.php"><button> LOG OUT</button></a>

 </div>

 <div class="container" >
   <form action="saveConsultation.php" class="register" name="myForm" onsubmit="return validateForm()" method="post">
    <h2 class="text_format">Patient Details</h2>
      <table class="tbl_in_consult">
        <?php 
          $selectResult = mysqli_query($conn,$sql);
          if(mysqli_num_rows($selectResult) > 0){
            $count = 0;
            while($row = mysqli_fetch_array($selectResult)){ ?>
                    <tr>
          <td>Matric Number:</td>
          <input type="hidden" name="medvalue" value="<?php echo $row['med_id'];?>">
          <td><?php echo $row['matricNo']; ?></td>
        </tr>
        <tr>
          <td>Name:</td>
          <td><?php echo $row['full_name']; ?></td>
        </tr>
        <tr>
          <td>Ic/Passport Number:</td>
          <td><?php echo $row['ic_number']; ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>Complaint/Symptom :</td>
          <td><textarea class="text_format" name="complaint" value="complaint" rows="3" cols="40"s></textarea></td>
        </tr>
        <tr>
          <td>Notes/Prescription :</td>
          <td><textarea class="text_format" name="commments" value="commments" rows="4" cols="40"s></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>Medicine :</td>
          <td><select class="text_format" name="drugs" id="drugs" style="width: 280px;">
            <?php 
              $selectDrug = "select drug_id,drug_name,price_per_unit,quantity from drug;";
              $selectResult2 = mysqli_query($conn,$selectDrug);
              if(mysqli_num_rows($selectResult) > 0){
                while ($row2 = mysqli_fetch_array($selectResult2)) {
                  echo "<option value='".$row2['drug_id']."'>".$row2['drug_name']."</option>";
                }
              }
            ?>
          </select></td>
        </tr>
        <tr>
          <td>Quantity :</td>
          <td><input type="number" name="quantity"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="" class="button" value="submit" onclick="validateForm()"></td>
        </tr>
           <?php }
          }else{
            echo "<tr><td colspan='6' align='center'>No Patient Available!</td></tr>";
          } 
        ?>

      </table>

    </form>

 </div>

 <script type="text/javascript">
	 function validateForm(){
		 var complaint = document.forms["myForm"]["complaint"].value;
		 var commments = document.forms["myForm"]["commments"].value;
		 var drugs = document.forms["myForm"]["drugs"].value;
				if (complaint == "") {
						alert("Please fill up complaint");
						focus();
						return false;
				 }else if (commments =="") {
						alert("Please fill up Comments");
						focus();
						return false;
					}else if (drugs =="") {
							alert("Please choose Medicine");
							focus();
							return false;

						 }
		 }
 </script>


 </body>
 </html>
