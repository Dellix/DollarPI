<?php
include('dbConnect.php');

session_start();
$count = $_SESSION['counter'];
$card = $_SESSION['card'];



for ($i = 0; $i <= $count; $i++){
	$index = "chk$i";
	$v[$i] = $_POST[$index];
	}

for ($i = 0; $i <= $count; $i++){
	
	$src = $mysqli->query("SELECT amount,type FROM movements WHERE movID = '$v[$i]'");
	$row = $src->fetch_assoc();
	if($row['type']==1) $src = $mysqli->query("UPDATE cards SET total = total - '".$row['amount']."' WHERE number = '$card'");
	if($row['type']==0) $src = $mysqli->query("UPDATE cards SET total = total + '".$row['amount']."' WHERE number = '$card'");
	
	$src = $mysqli->query("DELETE FROM movements WHERE movID = '$v[$i]'");
	
	
	}
	
	
    header("Location: ../pages/movementList.php");        
            
		
?>
