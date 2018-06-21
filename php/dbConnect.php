<?php
$mysqli = new mysqli('localhost', '<db_user>', '<db_password>', 'pi');
    if ($mysqli->connect_error) {
        die('Connection Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);}
?>
