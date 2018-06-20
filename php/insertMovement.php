<?php
include('dbConnect.php');

session_start();
$card = $_SESSION['card'];


	$amount = $_POST['amount'];
	$type = $_POST['type'];
	$date = $_POST['date'];  
	$note = $_POST['note'];  
	
	
	$src = $mysqli->query("INSERT INTO movements (card,amount,type,date,note) VALUES ('$card','$amount','$type','$date','$note')");
		if ($src===TRUE) {
			
			if($type==1) $src = $mysqli->query("UPDATE cards SET total = total + '$amount' WHERE number = '$card'");
			if($type==0) $src = $mysqli->query("UPDATE cards SET total = total - '$amount' WHERE number = '$card'");
			
			
			header("Location: ../pages/cardManager.php");
            }
        
        else{
			header("Location: ../pages/redirectErr.html");
            }
            
            

?>
