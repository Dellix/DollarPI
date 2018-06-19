<?php
include('loginControl.php');
include('dbConnect.php');

$user = $_SESSION['userID'];

if($_POST['set']==1){
	$newMail = $_POST['nmail'];
	
	$src = $mysqli->query("UPDATE users SET mail = '$newMail' WHERE userID = '$user'");
		if ($src===TRUE) {
			
			$mail = $newMail;
			$message = "The E-Mail of your DollarPI was changed.";
			
			include('sendMailSetting.php');
			
			
            header("Location: ../pages/cardManager.php");
            }
        
        else{
			header("Location: ../pages/redirectErr.html");
            }
	
	
	}





if($_POST['set']==2){
	$newPwd = md5($_POST['npwd']);
	
	$src = $mysqli->query("SELECT mail FROM users WHERE userID = '$user'");
	$row = $src->fetch_assoc();
	
	$mail = $row['mail'];
	$message = "The Password of your DollarPI was changed.";
	
	$src = $mysqli->query("UPDATE users SET pwd = '$newPwd' WHERE userID = '$user'");
		if ($src===TRUE) {
					
			include('sendMailSetting.php');
			
			
            header("Location: ../pages/cardManager.php");
            }
        
        else{
			header("Location: ../pages/redirectErr.html");
            }
	}


   
    
	
		
?>
