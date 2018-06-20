<html lang="en-Us">
<head>
	

	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<?php
	include('../php/loginControl.php');
	$user = $_SESSION['userID'];
	?>
	
	<meta charset="utf-8">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<title>Manage your cards</title>

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

<table style = "width: 100%;">
<tr>

<td>	
<div class = "addCard">
	<center><a href="#" onclick="document.getElementById('popup').style.display='block';return false;"><i class="fas fa-plus-circle">&nbsp;</i>Add a transaction</a></center>
</div>
</td>

<td>
<div class = "rmCard">
	<center><a href = "deleteMovement.php"> <i class="fas fa-trash-alt">&nbsp;</i>Delete a transaction</a></center>
</div>
</td>

</tr>
</table>

<table class = "paleBlueRows">
	<thead>
	<tr>
		<td><i class="far fa-credit-card"></i> Card Number</td>
		<td><i class="fas fa-dollar-sign"></i> Transaction</td>
		<td><i class="far fa-calendar-alt"></i> Date</td>
		<td><i class="fas fa-sticky-note"></i> Note</td>
		
	</tr>	
	</thead>
	
	<tbody>
	<?php
	include('../php/dbConnect.php');
	
	if($_SESSION['card']=='') $cardNumber = $_POST['card'];
	else $cardNumber = $_SESSION['card'];
	
	$src = $mysqli->query("SELECT * FROM movements WHERE card = '$cardNumber'");
	$cardNumber = "****-****-****-" . $cardNumber[12] . $cardNumber[13] . $cardNumber[14] . $cardNumber[15];
		
	if ($src->num_rows > 0) {    
		while($row = $src->fetch_assoc()) {
			
			
			
			echo "<tr>";
			echo "<td>" . $cardNumber . "</td>";
			
			
			if($row['type']==1) echo "<td> + " . $row['amount'] . "$</td>";
			if($row['type']==0) echo "<td> - " . $row['amount'] . "$</td>";
			
			
			echo "<td>" . $row['date'] . "</td>";
			echo "<td>" . $row['note'] . "</td>";
			echo "</tr>";
		}
	}
	
	session_start();
	$_SESSION['card'] = $_POST['card'];
	?>	
	</tbody>
</table>	

<div id="popup" class="modal">
  
  <form class="modal-content animate" action="../php/insertMovement.php" method="POST">
    

    <div class="container">
     
      Amount: <input type="number" name="amount" maxlength = "7" required>
      
      Type:
		<select name="type" class = "selBox">
		<option value="1">Income</option>
		<option value="0">Expense</option>
		</select>
     
      Date: <input type="date" name="date" required>
      
      Note: <input type="text" name="note" maxlength = "1000" required>
        
      <button type="submit">Submit</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      
      <button type="button" onclick="document.getElementById('popup').style.display='none'" class="cancelbtn">Cancel</button>
    
    </div>
  
  </form>

</div>


</body>
</html>
