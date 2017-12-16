<?php 
include 'connection/connection.php';
$userid = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT user_id,full_name,pass,ic_num,role FROM users WHERE user_id = '".$userid."' AND pass='".$pass."';";

$result = mysqli_query($conn,$sql);
if($result->num_rows > 0){
	session_start();
    while($row = mysqli_fetch_assoc($result)){
    	$_SESSION["userid"]=$row['user_id'];
    	$_SESSION["full_name"]=$row['full_name'];
    	$_SESSION["pass"]=$row['pass'];
    	$_SESSION["ic_num"]=$row['ic_num'];
    	$_SESSION["role"]=$row['role'];
    }
    echo "<script>location='mainmenu.php';</script>";
}else{
    echo "<script>alert('user does not exist');location='index.html';</script>";
}
mysqli_close($conn);
?>