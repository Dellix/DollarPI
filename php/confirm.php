<?php
include('dbConnect.php');
include('randStr.php');

$mail = $_GET["mail"];
$tk = $_GET["tk"];

$src = $mysqli->query("UPDATE users SET flag = 1 WHERE mail = '$mail' AND token = '$tk'");

if($src = TRUE){
	
	$tk = generateRandomString(8);
	$src = $mysqli->query("UPDATE users SET token = '$tk' WHERE mail = '$mail'");
	
	if($src = TRUE){
		echo "<script type='text/javascript'>alert('Account confirmed!')</script>";
		
		header("Location: ../index.html");
		}
	
	else{
		echo "<script type='text/javascript'>alert('Error! Try Again later')</script>";
		
		header("Location: ../index.html");
		}	
	}
	
else{
	echo "<script type='text/javascript'>alert('Error! Try Again later')</script>";
	
	header("Location: ../index.html");
	}
?>
