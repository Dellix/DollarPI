<?php
include('dbConnect.php');

	
    $mail = $_POST['mail'];
	  
    
	$src = $mysqli->query("SELECT token FROM users WHERE mail = '$mail'");
		if ($src->num_rows > 0) {
			 
			$row = $src->fetch_assoc();
			$tk = $row['token'];
			
			include('sendMailRecover.php');  
			header("Location: ../pages/mailRedirect.html");
			
            }
        
        else{
			header("Location: ../pages/redirectErr.html");
            }
		
?>
