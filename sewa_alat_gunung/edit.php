<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM rentals WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $rental = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $stmt = $pdo->prepare("UPDATE rentals SET name = :name, email = :email WHERE id = :id");
    $stmt->execute(['name' => $name, 'email' => $email, 'id' => $_GET['id']]);
    header("Location: tampildata.php"); // Mengarahkan ke tampildata.php
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Edit Data</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="name" value="<?php echo htmlspecialchars($rental['name']); ?>" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($rental['email']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>
;