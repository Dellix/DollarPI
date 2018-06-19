<?php
include('dbConnect.php');

session_start();
$count = $_SESSION['counter'];



for ($i = 0; $i <= $count; $i++){
	$index = "chk$i";
	$v[$i] = $_POST[$index];

	}

for ($i = 0; $i <= $count; $i++){
	$src = $mysqli->query("DELETE FROM cards WHERE number = '$v[$i]'");
	}
	
	
    header("Location: ../pages/cardManager.php");        
            
		
?>
