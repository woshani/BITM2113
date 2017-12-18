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

  <title class="text_format"> Pharmacy </title>
</head>

<body>
  <div class="topnav">
    <h1 class="text_format"> List to Dispense </h1>
    <br/>
 </div>

 <div class="sidenav">

   <img src="#"/>
   <p class="text_format"> WELCOME SITI </p>
<!--    <button> MANAGE ACCOUNT</button>
-->	 <a href="../mainmenu.php"><button>HOME</button></a>
   <a href="../out.php"><button> LOG OUT</button></a>

 </div>

 <div class="container" >
   <table id="listPatient" class="tbl">
        <tr>
          <th>No</th>
          <th>Matric Number</th>
          <th>Name</th>
          <th>Drug</th>
          <th>Notes</th>
          <th>Action</th>
        </tr>
        <?php

          $sql = "select d.consult_id,d.drug_id,d.quantity,d.notes,d.status,c.med_id,p.full_name,p.matricno,dr.drug_name from drug_prescription d,consultation c,patient p,drug dr where d.status = 'NOT' and c.consult_id = d.consult_id and c.med_id = p.med_id and dr.drug_id = d.drug_id;";
          $selectResult = mysqli_query($conn,$sql);
          if(mysqli_num_rows($selectResult) > 0){
            $count = 0;
            while($row = mysqli_fetch_array($selectResult)){ ?>
              <tr>
                <td><?php echo ($count+1); ?></td>
                <td><?php echo $row['matricno']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td> <?php echo $row['drug_name']; ?></td>
                <td> <?php echo $row['notes']; ?></td>
                <td>
                  <form action='print.php?matricno=<?php echo $row['matricno']; ?>&full_name=<?php echo $row['full_name']; ?>&drug_name=<?php echo $row['drug_name']; ?>&notes=<?php echo $row['notes']; ?>&consult_id=<?php echo $row['consult_id']; ?>&mediid=<?php echo $row['med_id'];?>' method='post'>
                    <?php
                      if($row['status'] == "Waiting"){ ?>
                        <input type='submit' value='Dispense' class='button'>
                      <?php }else{ ?>
                        <button class='button'>Dispense</button>
                     <?php }
                    ?>
                    <input type='hidden' name='medID' value='<?php echo $row["med_id"]; ?>'>
                  </form>
                </td>
              </tr>
           <?php }
          }else{
            echo "<tr><td colspan='6' align='center'>No Patient Available!</td></tr>";
          }
        ?>

      </table>
 </div>


 </body>
 </html>
