<?php
$server_name=SERVERIP;
$user_name=USER;
$password=PASSWORD;
$db_name=DATABASE_NAME;
$connection= new mysqli($server_name, $user_name, $password, $db_name);
// Check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>
