<?php
include('../php/dbConnect.php');


$tk = $_GET["tk"];

$src = $mysqli->query("SELECT token FROM users WHERE token = '$tk'");
		if ($src->num_rows > 0) {
?>
    
<html lang="en-Us">
<head>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<meta charset="utf-8">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<title>Password Recovery</title>

	<link rel="stylesheet" href="../css/style.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
	<script src="../js/script.js"></script>
	

</head>

<body>
    
    <div id="login">
    <img src="../img/logo.png" alt="$Pi" height="176" width="274">
		
		<h1>Insert your new password.</h1>
		<form action = "../php/newPassword.php" method = "POST">

			<fieldset>
						
				<p><input type = "hidden" name = "token" value = <?php echo "$tk"; ?> ></p>
					
				<p><input type = "password" id = "pwdField1" name = "pwd1" placeholder = "Password" required></p>
				
				<table>
				<tr>				
				<td> <p><input type = "password" id = "pwdField2" name = "pwd2" placeholder = "Repeat Password" onkeyup="checkPwd()"  required></p> </td>
				<td> <h1 id = "warning"></h1> </td>
				<tr>	
				</table>
						
				<p><input type = "submit" id = "logBtn" value = "Confirm"></p>

			
			</fieldset>

		</form>
	</div>
</body>
</html>   
    
<?php
  }
  
  else header("Location: ../index.html");
?>
