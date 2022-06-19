<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form</title>
  <?php
  include 'links.php';
  ?>

</head>

<body>
  <h2 class="text-center mt-5">Create Acount</h2>
  <div class="text-center">
    <a href="">Login with Gmail</a>
  </div>
  <div class="text-center">
    <a href="">Login with facebook</a>
  </div>


  <form action="" method="POST" class="mx-5">
    <div class="mb-3 mt-3 mx-5">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="name" value="" required>
    </div>
    <div class="mb-3 mt-3 mx-5">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email" value="" required>
    </div>
    <div class="mb-3 mx-5">
      <label for="pwd" class="form-label">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" value="" required>
    </div>
    <div class="mb-3 mx-5">
      <label for="pwd" class="form-label">Confirm Password:</label>
      <input type="password" class="form-control" placeholder="Re-enter password" name="cpassword" value="" required>
    </div>
    <input type="submit" class="btn btn-primary mx-5" name="submit">
  </form>
  <div class="text-center">
    Already have an account
    <a href="login.php">Login</a>
  </div>
</body>

</html>

<?php

include 'conn.php';

if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($connect, $_POST['name']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);
  $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);

  $pass = password_hash($password,PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

  $emailquery = "SELECT * FROM usersdata WHERE Email = '$email'";
  $eresult = mysqli_query($connect, $emailquery);

  $emailcount = mysqli_num_rows($eresult);
  if ($emailcount > 0) {
    echo 'Email Already exist';
  } else {
    if ($password === $cpassword) {
      $insertsql = "INSERT INTO usersdata (Name, Email, Password , Confirmpass) 
      VALUE ('$name', '$email','$pass', '$cpass')";
      $result = mysqli_query($connect, $insertsql);

      if ($result) {
        echo "Signup success";
      } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
      }
    } else {
      echo 'Password not matched!';
    }
  }




}

?>