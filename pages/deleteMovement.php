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



<form action="../php/delMovement.php" method="POST">
<fieldset>
<table class = "paleBlueRows">
	<thead>
	<tr>
		<td>Select</td>
		<td><i class="far fa-credit-card"></i> Card Number</td>
		<td><i class="far fa-user"></i> Transaction</td>
		<td><i class="far fa-user"></i> Date</td>
		<td><i class="far fa-calendar-alt"></i> Note</td>
	</tr>	
	</thead>
	
	<tbody>
	<?php
	session_start();
	$cardNumber = $_SESSION['card'];
	
	include('../php/dbConnect.php');
	$src = $mysqli->query("SELECT * FROM movements WHERE card = '$cardNumber'");
	$cardNumber = "****-****-****-" . $cardNumber[12] . $cardNumber[13] . $cardNumber[14] . $cardNumber[15];
	$count = 0;
		
	if ($src->num_rows > 0) {    
		while($row = $src->fetch_assoc()) {
			
			$number = $row['movID'];
			
			
			echo "<tr>";
			echo "<td> <input type = 'checkbox' name = 'chk$count' value = '".$row['movID']."'/> </td>";
			echo "<td>" . $cardNumber . "</td>";
			
			
			if($row['type']==1) echo "<td> + " . $row['amount'] . "$</td>";
			if($row['type']==0) echo "<td> - " . $row['amount'] . "$</td>";
			
			
			echo "<td>" . $row['date'] . "</td>";
			echo "<td>" . $row['note'] . "</td>";
			
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
