<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM regist WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['fname']))
if (isset ($_POST['mname']))
if (isset ($_POST['lname']))
if (isset ($_POST['address']))
if (isset ($_POST['gender']))
if (isset ($_POST['phone']))
if (isset ($_POST['email']))
if (isset ($_POST['uname']))
if (isset ($_POST['password']))






{
  //This is read data base data and re-copy db data form edit form.
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $address=$_POST['address'];
  $gender=$_POST['gender'];
  $phone = $_POST['phone'];
  $email=$_POST['email'];
  $uname = $_POST['uname'];
  $pass = $_POST['password'];
  $sql = 'UPDATE regist SET fname=:fname, mname-:mname lname=:lname address=:address gender=:gender phone=:phone email=:email uname=:uname password=:password WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname, ':mname' => $mname,':lname' => $lname,':address' => $address,':gender' => $gender,':phone' => $phone,':email' => $email,':uname' => $uname,':password' => $pass,':id' => $id])) {
    header("Location:index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->fname; ?>" type="text" name="fname" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Middle Name</label>
          <input type="text" value="<?= $person->mname; ?>" name="mname" id="email" class="form-control">
        </div>
        <!-- This is edit web page interface input data and receive data manage section,reg form -->
        <div class="form-group">
       <label for="name">Last Name</label>
          <input value="<?= $person->lname; ?>" type="text" name="lname" id="name" class="form-control">
          </div>

          <div class="form-group">
          <label for="name">Address</label>
          <input value="<?= $person->address; ?>" type="text" name="address" id="name" class="form-control">
          </div>
          
          <div class="form-group">
          <label for="name">Gender</label>
          <input value="<?= $person->gender; ?>" type="text" name="gender" id="name" class="form-control">
          </div>

          <div class="form-group">
          <label for="name">Phone</label>
          <input value="<?= $person->phone; ?>" type="text" name="phone" id="name" maxlength="10" class="form-control">
          </div>

          <div class="form-group">
          <label for="name">Email</label>
          <input value="<?= $person->email; ?>" type="email" name="email" id="name" class="form-control">
            </div>

            <div class="form-group">
          <label for="name">Uname</label>
          <input value="<?= $person->uname; ?>" type="text" name="uname" id="name" class="form-control">
          </div>

          <div class="form-group">
          <label for="name">Password</label>
          <input value="<?= $person->password; ?>" type="text" name="password" id="name" class="form-control">
         </div>

         <div class="form-group">
          <button type="submit" class="btn btn-info">Update Student</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
