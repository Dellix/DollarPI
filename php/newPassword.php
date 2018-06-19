<?php
include('dbConnect.php');
include('randStr.php');


	$pwd = md5($_POST['pwd1']);
    $tk = $_POST['token'];
    
        
	$src = $mysqli->query("UPDATE users SET pwd = '$pwd' WHERE token = '$tk'");
		if ($src===TRUE) {
			
			$newTK = generateRandomString(8);		
			$mysqli->query("UPDATE users SET token = '$newTK' WHERE token = '$tk'");
			
			
            header("Location: ../index.html");
            }
        
        else{
			header("Location: ../pages/redirectErr.html");
            }
		
?>
