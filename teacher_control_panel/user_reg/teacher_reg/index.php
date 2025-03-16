
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
$gender=$_POST['gender'];
$phone = $_POST['phone'];
$email=$_POST['email'];
$user = $_POST['uname'];
$pass = $_POST['password'];
$register_query = "INSERT INTO `regist`(`fname`, `mname`, `lname`, `address`, `gender`, `phone`, `email`, `uname`, `password`) VALUES ('$fname','$mname','$lname','$address','$gender','$phone','$email','$user','$pass')";
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>siksa Student registration page</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<form action="conn.php" method="POST">
<div class="container">
  <div class="title">create an Student account</div>
  <div class="sub-container">
    <div class="form">
      <label class="label">First name :</label><br>
      <input type="text" class="input" name="fname" placeholder="Themiya">
    </div>
    <div class="form">
      <label class="label">Middle name :</label><br>
      <input type="text" class="input" name="mname" placeholder="Thanuja">
    </div>

  <div class="form">
      <label class="label">Last name :</label><br>
      <input type="text" class="input" name="lname" placeholder="Jayakodi">
    </div>

    <div class="form">
      <label class="label">Address :</label><br>
      <input type="text" name="address" class="input" placeholder="No20,Anuradhapura">
    </div>

    
     <h4>Gender</h4>
    <input type="radio" name="gender" value="male"> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
    <input type="radio" name="gender" value="other"> Other

    <div class="form">
      <br><label class="label">Phone :</label><br>
      <input type="tel" class="input" name="phone" placeholder="07000000">
    </div>

       <div class="form">
      <label class="label">Email :</label><br>
      <input type="text" class="input" name="email" placeholder="example@email.com">
     </div>

<div class="form">
      <label class="label">Username :</label><br>
      <input type="text" class="input" name="uname" placeholder="themi125">
    </div>

    <div class="form">
      <label class="label">Password :</label><br>
      <input type="text" class="input" name="password" value="admin" placeholder="********">
    </div>

  <input type="submit" name="submit" value="SignUp">

  </div>
</div>

</body>
</html>