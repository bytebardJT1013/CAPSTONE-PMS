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
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Create operation
if (isset($_POST['create'])) {
  $name = $_POST['name'];
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
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $stmt = $conn->prepare("UPDATE pdo_test SET name=:name, email=:email WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
}

// Delete operation
if (isset($_GET['delete'])) {
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

  <title>ACCOUNTS</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
      <h1>ACCOUNTS TABLE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Accounts Table</h5>

              <p>This module allows end-users to view, add, edit and delete user accounts</p>


              <!-- Table with stripped rows -->
              <h2>Add Users</h2>
              <form method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit" name="create" class="btn btn-primary"> <i class="fa-solid fa-plus">Add</i></button>
              </form>

              <h2>Users</h2>
              <table class="table table-striped" border="1">
                <tr>
                  <th><h2>ID</h2></th>
                  <th><h2>Name</h2></th>
                  <th><h2>Email</h2></th>
                  <th><h2>Action</h2></th>
                </tr>
                <?php foreach ($users as $user) { ?>
                  <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                    <button type="button" class="btn btn-warning"><a href="update.php?id=<?php echo $user['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                      <button type="button" class="btn btn-danger"><a href="?delete=<?php echo $user['id']; ?>"><i class="fa-regular fa-trash-can"></i></a> </button>
                    </td>
                  </tr>
                <?php } ?>
              </table>
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