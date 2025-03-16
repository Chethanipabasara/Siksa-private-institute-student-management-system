<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="demo";
try{
$conn = mysqli_connect($servername, $username,$password,$dbname);
echo("successful in connection");
}catch(MySQLi_Sql_Exception $ex){
echo("error in connection");
}
?>