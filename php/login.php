<?php
include('dbConnect.php');

    $mail = $_POST['mail'];
	$pwd = md5($_POST['pwd']);
    
   
    
	$src = $mysqli->query("SELECT mail, pwd, userID FROM users WHERE mail = '$mail' && pwd = '$pwd' && flag = '1'");
		if ($src->num_rows > 0) {
			session_start(); 
			$row = $src->fetch_assoc();
			$_SESSION['userID'] = $row['userID'];         
			$_SESSION['logControl'] = "LOGGED_IN";
            header("Location: ../pages/cardManager.php");
            }
      
        else{
			header("Location: ../pages/redirectErr.html");
            }
		
?>
