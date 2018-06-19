<?php
session_start();
$control = $_SESSION['logControl'];
	if($control!="LOGGED_IN"){
		header("Location: ../index.html");
		exit;
	}
?>
