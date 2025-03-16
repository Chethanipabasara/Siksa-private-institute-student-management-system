<?php
require 'index.php';
$conn = mysqli_connect("localhost","root","","demo");
 
if(!$conn)
{
    die("Connection error: " . mysqli_connect_error());	
}

$qry = "select * from regist where id=10";
$rs = mysqli_query($conn,$qry);
$getRow = mysqli_fetch_row($rs);
echo "<label>Fist Name: </label>".$getRow['1'];
echo "<br>";
echo "<label>Middle Name: </label>".$getRow['2'];
echo "<br>";
echo "<label>Last Name: </label>".$getRow['3'];
echo "<br>";
echo "<label>Subject: </label>".$getRow['4'];
echo "<br>";
echo "<label>Address: </label>".$getRow['5'];
echo "<br>";
echo "<label>Gender: </label>".$getRow['6'];
echo "<br>";
echo "<label>Phone: </label>".$getRow['7'];
echo "<br>";
echo "<label>Email: </label>".$getRow['8'];
echo "<br>";
echo "<label>User Name: </label>".$getRow['9'];
echo "<br>";
echo "<label>Password: </label>".$getRow['10'];







?>