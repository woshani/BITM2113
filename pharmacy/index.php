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
 -->	 <a href="../mainmenu.html"><button>HOME</button></a>
   <a href="../index.html"><button> LOG OUT</button></a>

 </div>

 <div class="container" >
   <table id="listPatient" class="tbl">
        <tr>
          <th>No</th>
          <th>Matric Number</th>
          <th>Ic/Passport</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        <?php
          $sql = "select med_id,ic_number,matricNo,full_name,gender,age,address,email,idType,status from patient order by status";
          $selectResult = mysqli_query($conn,$sql);
          if(mysqli_num_rows($selectResult) > 0){
            $count = 0;
            while($row = mysqli_fetch_array($selectResult)){
              echo "<tr><td>".($count+1)."</td><td>".$row['matricNo']."</td><td>".$row['ic_number']."</td><td>".$row['full_name']."</td><td>".$row['status']."</td><td><form action='consult.php' method='post'><input type='submit' value='consult' class='button'><input type='hidden' name='medID' value='".$row['med_id']."'></form></td></tr>";
            }
          }else{
            echo "<tr><td colspan='6' align='center'>No Patient Available!</td></tr>";
          } 
        ?>

      </table>
 </div>


 </body>
 </html>
