<?php
$mysqli = new mysqli("localhost", "root", "", "demo");

// if connection failed, terminate execution
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 