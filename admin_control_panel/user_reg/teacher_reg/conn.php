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
$address=$_POST['address'];
$subject=$_POST['subject'];
$Qualification=$_POST['Qualification'];
$gender=$_POST['gender'];
$phone = $_POST['phone'];
$email=$_POST['email'];
$city=$_POST['city'];
$user = $_POST['uname'];
$pass = $_POST['password'];
$register_query = "INSERT INTO `teacher_regist`(`fname`, `mname`, `lname`, `address`, `subject`, `Qualification`, `gender`, `phone`, `email`,`city`, `uname`, `password`) VALUES ('$fname','$mname','$lname','$address','$subject','$Qualification','$gender','$phone','$email','$city','$user','$pass')";
try{
$register_result = mysqli_query($conn, $register_query);
if($register_result){
if(mysqli_affected_rows($conn)>0){
echo("registration successful");
}else{
echo("error in registration");
}
 
}
}catch(Exception $ex){
echo("error".$ex->getMessage());
}
}
 ?>