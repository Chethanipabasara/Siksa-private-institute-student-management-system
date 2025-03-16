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
if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$subject=$_POST['subject'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$phone = $_POST['phone'];
$email=$_POST['email'];
$user = $_POST['uname'];
$pass = $_POST['password'];

$register_query = "INSERT INTO `regist`(`fname`, `mname`, `lname`,`subject`, `address`, `gender`, `phone`, `email`, `uname`, `password`) VALUES ('$fname','$mname','$lname','$subject','$address','$gender','$phone','$email','$user','$pass')";
try{
$register_result = mysqli_query($conn, $register_query);//sql want to insert data but connects to db?
if($register_result){//return a message to webpage
if(mysqli_affected_rows($conn)>0){//rows in php insert
echo("registration successful");
}else{
echo("error in registration");
}
 
}
}catch(Exception $ex){//for catch the error and handling
echo("error".$ex->getMessage());
}
}
 
?>