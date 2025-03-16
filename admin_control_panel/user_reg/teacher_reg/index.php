

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>siksa Teacher registration page</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<form action="conn.php" method="POST">
<div class="container">
  <div class="title">create an Teacher account</div>
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
    <div class="form">
      <label class="label">Subject :</label><br>
      <input type="text" name="subject" class="input" placeholder="Subject">
    </div>

    <div class="form">
      <label class="label">Qualification :</label><br>
      <input type="text" name="Qualification" class="input" placeholder="Qualification">
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
      <label class="label">City :</label><br>
      <input type="text" class="input" name="city" placeholder="Anuradhapura">
     </div>

<div class="form">
      <label class="label">Username :</label><br>
      <input type="text" class="input" name="uname" placeholder="themi125">
    </div>

    <div class="form">
      <label class="label">Password :</label><br>
      <input type="password" class="input" name="password" value="admin" maxlength="15" id="pass" placeholder="********">
    </div>

  <input type="submit" name="submit" value="SignUp">

  </div>
</div>

</body>
</html>