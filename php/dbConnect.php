<?php
$mysqli = new mysqli('localhost', 'root', '<db_user>', '<db_password>');
    if ($mysqli->connect_error) {
        die('Connection Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);}
?>
