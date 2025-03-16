<?php
ob_start();
session_start();
ob_end_clean();

if (isset($_SESSION["uname"])){
	$_SESSION_uname=$_SESSION['uname'];
}
else{
	ob_start();
	header("location:login.php");
	ob_end_clean();
}
?>