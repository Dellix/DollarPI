<?php
include('dbConnect.php');



	$card = $_POST['cardNumber'];
	$date = $_POST['exDate'];
	$total = $_POST['amount'];   
	
	session_start();
	$user = $_SESSION['userID'];
    
	$src = $mysqli->query("INSERT INTO cards (number,expireDate,total,holderID) VALUES ('$card','$date','$total','$user')");
		if ($src===TRUE) {
			header("Location: ../pages/cardManager.php");
            }
        
        else{
			header("Location: ../pages/redirectErr.html");
            }
            
            
		
?>
