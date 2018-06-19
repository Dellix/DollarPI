<?php
include('dbConnect.php');
include('randStr.php');


	$name = $_POST['name'];
	$surname = $_POST['surname'];
    $mail = $_POST['mail'];
	$pwd = md5($_POST['pwd1']);
    $tk = generateRandomString(8);
   
    
	$src = $mysqli->query("INSERT INTO users (mail,pwd,name,surname,token) VALUES ('$mail','$pwd','$name','$surname','$tk')");
		if ($src===TRUE) {
					
			include('sendMailRegister.php');
			
			
            header("Location: ../pages/mailRedirect.html");
            }
        else{
			header("Location: ../pages/redirectErr.html");
            }
		
?>
