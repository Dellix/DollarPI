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
	
	<style>
	button.hideMe{
    background:none!important;
     border:none; 
     padding:0!important;
    
    /*optional*/
    font-family:arial,sans-serif; /*input has OS specific font-family*/
     color:#069;
     text-decoration:underline;
     cursor:pointer;
	}
	</style>


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
	<center><a href="#" onclick="document.getElementById('popup').style.display='block';return false;"><i class="fas fa-plus-circle">&nbsp;</i>Add a card</a></center>
</div>
</td>

<td>
<div class = "rmCard">
	<center><a href = "deleteCards.php"> <i class="fas fa-trash-alt">&nbsp;</i>Delete a card</a></center>
</div>
</td>

</tr>
</table>

<table class = "paleBlueRows">
	<thead>
	<tr>
		<td><i class="far fa-credit-card"></i> Card Number</td>
		<td><i class="far fa-user"></i> Holder Name</td>
		<td><i class="far fa-user"></i> Holder Surname</td>
		<td><i class="far fa-calendar-alt"></i> Expire Date</td>
		<td><i class="fas fa-dollar-sign"></i> Total</td>
	</tr>	
	</thead>
	
	<tbody>
	<?php
	include('../php/dbConnect.php');
	$src = $mysqli->query("SELECT number, expireDate, total, name, surname FROM cards, users WHERE userID = $user AND holderID = $user;");
		
	if ($src->num_rows > 0) {    
		while($row = $src->fetch_assoc()) {
			
			$cardNumber = "****-****-****-" . $row['number'][12] . $row['number'][13] . $row['number'][14] . $row['number'][15];
			
			echo "<tr>";
			
			echo "<td>";
			echo "<form action = 'movementList.php' method = 'POST'>";
			echo "<input type = 'hidden' name = 'card' value = '".$row['number']."'/>";
			echo "<button class = 'hideMe' type = 'submit'>$cardNumber</button>";
			echo "</form>";
			echo "</td>";
			
			
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['surname'] . "</td>";
			echo "<td>" . $row['expireDate'] . "</td>";
			
			if($row['total'] < 0) echo "<td><font color='red'> " . $row['total'] . "$</td></font>";
			else echo "<td>" . $row['total'] . "$</td>";
			
			echo "</tr>";
		}
	}
	?>	
	</tbody>
</table>	

<div id="popup" class="modal">
  
  <form class="modal-content animate" action="../php/insertCard.php" method="POST">
    

    <div class="container">
     
      Card Number: <input type="number" name="cardNumber" maxlength = "16" required>
      
      Total Amount: <input type="number" name="amount" required>
     
      Expire Date: <input type="date" name="exDate" required>
        
      <button type="submit">Submit</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      
      <button type="button" onclick="document.getElementById('popup').style.display='none'" class="cancelbtn">Cancel</button>
    
    </div>
  
  </form>

</div>


</body>
</html>
