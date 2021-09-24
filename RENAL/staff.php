<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: index.php");
}
?>

<?php
$err = false;
$succ = false;

require 'C:/xampp/htdocs/RENAL/partials/_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name1'];
  $phno = $_POST['phone'];
  $age = $_POST['age'];
  $date = $_POST['date'];

  //check whether phone number already exists or not
  $existSql = "SELECT * FROM `patient` WHERE phone='$phno'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    $err = true;
  } else {

    $sql = "INSERT INTO `patient` (`name`, `phone`, `age`, `date`, `timestamp`) VALUES ('$name', '$phno', '$age', '$date', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    $succ = true;
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
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Logout.php">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <?php
  if ($succ) {
    echo '<div class="alert alert-success" role="alert">
    Record Inserted Successful!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  if ($err) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> Phone no already exists.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  ?>
  </div>
  <div class="container mt-4">
    <h4 style="text-align: center;">Add Patient</h4>
  </div>

  <div class="container mt-4">
    <form action="staff.php" method="POST">

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputText" name="name1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPhone" class="form-label">Phone Number</label>
        <input type="text" maxlength="10" class="form-control" id="examplInputPhone1" name="phone">
      </div>
      <div class="mb-3">
        <label for="exampleInputAge" class="form-label">Age</label>
        <input type="number" class="form-control" id="exampleInputAge1" name="age">
      </div>
      <label for="exampleInputDate" class="form-label">Today's Date</label>
      <input type="date" class="form-control" id="exampleInputDate1" name="date">
      <div class="container mt-4">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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