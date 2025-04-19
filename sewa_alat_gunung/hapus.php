<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM rentals WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    header("Location: index.php");
}
?>
