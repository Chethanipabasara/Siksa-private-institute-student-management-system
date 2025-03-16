<!DOCTYPE html>
<html>
<head>
	<title>Siksa Student details table</title>
</head>
<body>
	<table cellspacing="30" cellpadding="5" border="1" >
		
		<tr>
			<th>id</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Subject</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Email</th>
			<th>User Name</th>
			<th>Password</th>

		</tr>
		<?php

		$conn= mysqli_connect("localhost","root","","demo");
	if ($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}
       $sql ="SELECT id,fname,mname,lname,subject,address,gender,phone,email,uname,password FROM regist";
       $result = $conn-> query ($sql);

       if($result-> num_rows > 0){
       	while ($row =$result-> fetch_assoc()){
       		echo "<tr> <td>".$row["id"]."</td> <td>".$row["fname"]."</td> <td>".$row["mname"]."</td> <td>".$row["lname"]."</td> <td>".$row["subject"]."</td> <td>".$row["address"]."</td> <td>".$row["gender"]."</td> <td>".$row["phone"]."</td> <td>".$row["email"]."</td> <td>".$row["uname"]."</td> <td>".$row["password"]."<td> <tr>";
       	}
       	echo "</table>";
       }
       else{
       	echo "0 result";
       }
       $conn-> close();

		
		?>
</table>
</body>
</html>