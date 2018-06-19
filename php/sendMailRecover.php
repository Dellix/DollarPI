<?php
$ip = $_SERVER['SERVER_ADDR'];
$link = "http://$ip/pages/recover.php?tk=$tk";


$subject = "DollarPI Password Recovery";
$message = "<a href='$link'>Click here to recover your E-Mail!</a>";

$headers = 'From:DollarPI' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail($mail,$subject,$message,$headers);
?>
