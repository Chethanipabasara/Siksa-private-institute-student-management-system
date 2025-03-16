<?php
session_start();
?>


<html>
<head>
    <title> Student login </title>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
    <body>
    <div class="login-box">
    <img src="avatar.png" class="avatar">
        <h1>Student login</h1>
            <form  method="POST" action="conn.php">
            <p>Username</p>
            <input type="text" name="uname" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="#">Forget Password</a>    
            </form>
        
        
        </div>
    
    </body>
</html>
<?php
session_destroy();
?>