<?php
	include_once('db.php');
 
	if( isset($_GET['edit']) )
	{
		$id = $_GET['edit'];
		$res= mysql_query("SELECT * FROM regist WHERE id='$id'");
		$row= mysql_fetch_array($res);
	}
 
	if( isset($_POST['newName']) )
	{
		$newName = $_POST['newName'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE regist SET name='$newName' WHERE id='$id'";
		$res 	 = mysql_query($sql) 
                                    or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
 
?>
<form action="edit.php" method="POST">
Name: <input type="text" name="newName" value="<?php echo $row[1]; ?/>"><br />
<input type="hidden" name="id" value="<?php echo $row[0]; ?/>">
<input type="submit" value=" Update "/>
</form>