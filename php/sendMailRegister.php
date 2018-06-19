<?php
$ip = $_SERVER['SERVER_ADDR'];
$link = "http://$ip/php/confirm.php?mail=$mail&tk=$tk";


$subject = "DollarPI Registration";
$message = "<a href='$link'>Click here to confirm your registration!</a>";

$headers = 'From:DollarPI' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail($mail,$subject,$message,$headers);
?>
