<?php

$err = false;
$succ = false;
//connection to db
require 'C:/xampp/htdocs/RENAL/partials/_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['passcode'];
  if (isset($_POST['submit'])) {
    $selected_val = $_POST['category'];


     $sql = "SELECT * FROM `forall` WHERE username='$username' AND passcode='$password' AND category='$selected_val'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_fetch_row($result);
    if (!$num == 1) {
      $err = true;
    } else {
      $checkCate = "SELECT * FROM `forall` WHERE username='$username' AND category='doctor'";
      $result = mysqli_query($conn, $checkCate);
      $numExistRows = mysqli_num_rows($result);
      if ($numExistRows > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: doctor.php");
      }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['passcode'];
      if (isset($_POST['submit'])) {
        $selected_val = $_POST['category'];

        $sql = "SELECT * FROM `forall` WHERE username='$username' AND passcode='$password' AND category='$selected_val'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_fetch_row($result);
        if (!$num == 1) {
          $err = true;
        } else {
          $checkCate = "SELECT * FROM `forall` WHERE username='$username' AND category='staff'";
          $result = mysqli_query($conn, $checkCate);
          $numExistRows = mysqli_num_rows($result);
          if ($numExistRows > 0) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: staff.php");
          }
        }
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['passcode'];
        if (isset($_POST['submit'])) {
          $selected_val = $_POST['category'];

          $sql = "SELECT * FROM `forall` WHERE username='$username' AND passcode='$password' AND category='$selected_val'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_fetch_row($result);
          if (!$num == 1) {
            $err = true;
          } else {
            $checkCate = "SELECT * FROM `forall` WHERE username='$username' AND category='admin'";
            $result = mysqli_query($conn, $checkCate);
            $numExistRows = mysqli_num_rows($result);
            if ($numExistRows > 0) {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $username;
              header("location: admin.php");
            }
          }
        }
      }
    }
  }
}



?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>THE RENAL PROJECT</title>
</head>

<body>
  <?php
  if ($err) {
    echo '<div class="alert alert-danger fade show" role="alert">
      <strong>Alert!</strong> You should check in on some of those fields below.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>
  <div class="container mt-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">The RENAL Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="container mt-4">
    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputText" name="username" aria-describedby="userHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="passcode">
      </div>
      <div class="mt-4">
        <select class="form-select" aria-label="Default select example" name="category">
          <option selected>select</option>
          <option value="staff" name="staff">Staff</option>
          <option value="admin" name="admin">Admin</option>
          <option value="doctor" name="doctor">Doctor</option>
        </select>
      </div> <br>
      <button type="submit" class="btn btn-primary" name="submit">Log In</button>
    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>