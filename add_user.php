<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "capstonepms";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Create operation
if(isset($_POST['submit'])){
    $lname = $_POST['lastname'];
    $lname = $_POST['firstname'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO pdo_test (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}

// Read operation
$stmt = $conn->prepare("SELECT * FROM pdo_test");
$stmt->execute();
$users = $stmt->fetchAll();

// Update operation
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $lname = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE pdo_test SET name=:name, email=:email WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}

// Delete operation
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM pdo_test WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADD USERS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
 
  <!-- ======= Header ======= -->
  <?php require_once 'includes/navbar.php' ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php require_once 'includes/sidebar.php' ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ADD USERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item "><a href="user.php">User</a></li>
          <li class="breadcrumb-item active">Add User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ADD ACCOUNT</h5>

              <p>This module allows admin to add user accounts</p>

              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">ADD ACCOUNT</h5>

                  <!-- Multi Columns Form -->
                  <form action="add_user.php"  method="POST">
                    <div class="col-md-12">

                    <div class="col-md-6">
                      <label for="userID" class="form-label">User ID:</label>
                      <input type="text" name="userID" class="form-control"  required>
                    </div>

                    <div class="col-md-6">
                      <label for="password" class="form-label">Password:</label>
                      <input type="password" name="password" class="form-control"  required>
                    </div>

                    <div class="col-md-8">
                      <label for="lastname" class="form-label">Last Name:</label>
                      <input type="text" name="lastname" class="form-control"  required>
                    </div>

                    <div class="col-md-8">
                      <label for="firstname" class="form-label">First Name:</label>
                      <input type="text" name="firstname" class="form-control"  required>
                    </div>

                    <div class="col-md-8">
                      <label for="middlename" class="form-label">Middle Name:</label>
                      <input type="text" name="middlename" class="form-control"  required>
                    </div>
                    
                    <div class="col-md-6">
                      <label for="email" class="form-label">Email:</label>
                      <input type="text" name="email" class="form-control" placeholder="name@domain.com"  required>
                    </div>

                    <div class="col-8">
                      <label for="primarynum" class="form-label">Primary Contact Number:</label>
                      <input type="text" name="primarynum" class="form-control" placeholder="+63/02-"  required>
                      
                    </div>

                    <div class="col-8">
                      <label for="secnum" class="form-label">Secondary Contact Number:</label>
                      <input type="text" name="secnum" class="form-control" placeholder="+63/02-"  required>
                    </div>

                    <div class="col-md-4">
                      <label for="email" class="form-label">Role:</label>
                      <input type="text" name="role" class="form-control" required>
                    </div>



                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="submit"><i class="fa-solid fa-check"> Submit </i></button>
                      <button type="cancel" class="btn btn-danger" a href="user.php"><i class="fa-solid fa-xmark"> Cancel </i></button>
                    </div>
                  </form>

                  <!-- Table with stripped rows -->

                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>
          </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require_once 'includes/footer.php' ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>