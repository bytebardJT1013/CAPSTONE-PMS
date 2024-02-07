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
if(isset($_POST['create'])){
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
if(isset($_POST['update'])){
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
</head>
<body>
    <h2>Create User</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="create">Create</button>
    </form>

    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user) {?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $user['id']; ?>">Edit</a>
                    <a href="?delete=<?php echo $user['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>