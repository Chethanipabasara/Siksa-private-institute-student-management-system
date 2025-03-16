<?php
require 'db.php';
$sql = 'SELECT * FROM regist';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h3>Welcome to Siksa Student Management Section</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">

      <h5>Registered Student</h5><!-- This is web page table row names -->
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Subject</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>User name</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?><!-- This is web page data copy and paste in db readable functions -->
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->fname; ?></td>
            <td><?= $person->mname; ?></td>
            <td><?= $person->lname; ?></td>
            <td><?= $person->subject; ?></td>
            <td><?= $person->address; ?></td>
            <td><?= $person->gender; ?></td>
            <td><?= $person->phone; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->uname; ?></td>
            <td><?= $person->password; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a><!-- This is redirection to edit php file to read functions -->
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
