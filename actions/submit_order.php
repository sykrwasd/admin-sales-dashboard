<?php
require_once '../config/connectdb.php';

// Check if all required fields are set
if (isset($_POST['name'], $_POST['phoneNum'], $_POST['collegeName'], $_POST['roomNum'], $_POST['method'], $_POST['totalPrice'], $_POST['orderDate'])) {
    $name = $_POST['name'];
    $phoneNum = $_POST['phoneNum'];
    $collegeName = $_POST['collegeName'];
    $roomNum = $_POST['roomNum'] === '' ? null : $_POST['roomNum'];
    $method = $_POST['method'];
    $totalPrice = $_POST['totalPrice'];
    $orderDate = $_POST['orderDate'];

    // Prepare SQL query to insert the order into the database
    $sql = "INSERT INTO orders (name, phoneNum, collegeName, roomNum, method, totalPrice, orderDate) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssds", $name, $phoneNum, $collegeName, $roomNum, $method, $totalPrice, $orderDate);

    if ($stmt->execute()) {
        echo "Order submitted successfully!"; // Return success message
    } else {
        echo "Error: " . $stmt->error; // Return error message if there’s an issue
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Missing required fields!"; // Handle missing data error
}
?>
