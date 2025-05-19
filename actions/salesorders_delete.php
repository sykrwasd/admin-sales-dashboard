<?php
include('../config/connectdb.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $orderId = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
