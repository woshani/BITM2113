<!DOCTYPE html>
<?php
  include "../connection/connection.php";
  session_start();
  if(!isset($_SESSION['userid']))
  {
      header("Location: ../index.php");
      exit;
  } 
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
  <style type="text/css">

  </style>
  <title class="text_format"> Main Menu </title>
</head>

<body>
  <div class="topnav">
    <h1 class="text_format"> List Patient </h1>
    <br/>
 </div>

 <div class="sidenav">

   <img src="#"/>
   <p class="text_format"> WELCOME <b><?php echo $_SESSION['full_name']; ?></b> </p>
   <p class="text_format"><?php echo $_SESSION['role'];?></p>
<!--    <button> MANAGE ACCOUNT</button>
 -->	 <a href="../mainmenu.php"><button>HOME</button></a>
   <a href="../out.php"><button> LOG OUT</button></a>

 </div>

 <div class="container" >
   <div  class="register">
      <table id="listPatient" class="tbl">
        <tr>
          <th>No</th>
          <th>Matric Number</th>
          <th>Ic/Passport</th>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
       <?php
          $sql = "select med_id,ic_number,matricNo,full_name,gender,age,address,email,date_in,status from patient where status != 'Discharged' order by status";
          $selectResult = mysqli_query($conn,$sql);
          if(mysqli_num_rows($selectResult) > 0){
            $count = 0;
            while($row = mysqli_fetch_array($selectResult)){ ?>
              <tr>
                <td><?php echo ($count+1); ?></td> 
                <td><?php echo $row['matricNo']; ?></td>
                <td><?php echo $row['ic_number']; ?></td>
                <td> <?php echo $row['full_name']; ?></td>
                <td> <?php echo $row['status']; ?></td>
                <td>
                  <form action='consult.php' method='post'>
                    <?php
                      if($row['status'] == "Waiting"){ ?>
                        <input type='submit' value='consult' class='button'>
                      <?php }else{ ?>
                        <button class='button' disabled style="background-color: #c63d3d;">consult</button>
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

 </div>


 </body>
 </html>
