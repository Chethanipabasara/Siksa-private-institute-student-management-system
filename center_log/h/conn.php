<?php
$uname=$_POST['uname'];//username
$password=$_POST['password'];//password 
session_start();

$con=mysqli_connect("localhost","root","","demo");//mysqli("localhost","username of database","password of database","database name")
$result=mysqli_query($con,"SELECT * FROM `login_info` WHERE `uname`='$uname' && `password`='$password'");
$count=mysqli_num_rows($result);
if($count==1)
{

	$_SESSION['log']=1;
	header("refresh:0;url=../../progressbar/progressBars/index.php");

}
else
{
	
	header("refresh:0;url=../../progressbar/progressBars/progress_error.php");// it takes 2 sec to go index page
}


?>