<html lang="en-Us">
<head>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<?php
	include('../php/loginControl.php');
	$user = $_SESSION['userID'];
	?>
	
	<meta charset="utf-8">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<title>Delete cards</title>

	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/table.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/popup.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>


</head>

<body>

<ul>
  <li><a href="../pages/settings.html" class="active"> <i class="fas fa-cog"></i> </a></li>
  <li><a href="cardManager.php">Cards</a></li>
  <li style="float:right"><a href="../php/logout.php"><i class="fas fa-door-open"></i> Log out</a></li>
</ul>



<form action="../php/delCard.php" method="POST">
<fieldset>
<table class = "paleBlueRows">
	<thead>
	<tr>
		<td>Select</td>
		<td><i class="far fa-credit-card"></i> Card Number</td>
	</tr>	
	</thead>
	
	<tbody>
	<?php
	include('../php/dbConnect.php');
	$src = $mysqli->query("SELECT number, expireDate, total, name, surname FROM cards, users WHERE userID = $user AND holderID = $user;");
	$count = 0;
		
	if ($src->num_rows > 0) {    
		while($row = $src->fetch_assoc()) {
			
			$number = $row['number'];
			$cardNumber = "****-****-****-" . $row['number'][12] . $row['number'][13] . $row['number'][14] . $row['number'][15];
			
			echo "<tr>";
			echo "<td> <input type = 'checkbox' name = 'chk$count' value = '$number'/> </td>";
			echo "<td>" . $cardNumber . "</td>";
			echo "</tr>";
			
			$count = $count+1;
		}
	}
	
	session_start();
	$_SESSION['counter'] = $count;
	?>	
	</tbody>
</table>

<center><input type = "submit" style = "background-color: #9e1227; margin-top: 3%;" value = "Delete" onclick="return confirm('Do you really want to delete the selected element(s)?')"></center>
</fieldset>
</form>


</body>
</html>
