<?php
  session_start();
  if(isset($_SESSION['userid']))
{
    header("Location: mainmenu.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-clinic</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body class="backColor">
	<header></header>
	<nav></nav>
	<section>
	<div align="center" class="divLogin">
		<form class="login" action="login.php" method="POST" name="myForm" onsubmit="return validateForm()">
			<div><h1 class="title titleH1">WELCOME TO E-CLINIC</h1></div>
			<div><img src="IMG/ICONLOGIN.png" height="100px" width="100px"></div>
			<div align="center">
				<table >
					<tr>
						<td class="childDiv"><b class="title">USER ID:</b></td>
						<td class="childDiv"><input type="text" name="username" id="username" maxlength="10"></td>
					</tr>
					<tr>
						<td class="childDiv"><b class="title">PASSWORD:</b></td>
						<td class="childDiv"><input type="password" name="password" id="password"></td>
					</tr>
					<tr>
						<td class="childDiv"><input type="submit" name="Login" id="loginbtn" value="Login" onclick="validate()"></td>
						<td class="childDiv"><input type="submit" name="Cancel" id="cancelbtn" value="Cancel"></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	</section>
	<footer></footer>

	<script type="text/javascript">
		function validateForm(){
			var name = document.forms["myForm"]["username"].value;
			var password = document.forms["myForm"]["password"].value;
				 if (name == "") {
						 alert("username must be filled out");
						 return false;
	 			 	}else if (password =="") {
		 				 alert("password must be filled out");
						 focus();
						 return false;

	 			 		}
			}
	</script>
</body>

</html>
