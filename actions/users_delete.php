<?php
// Include your database connection
include('../config/connectdb.php');

// Check if the id is set and is a number
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Prepare the delete statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Redirect back to the users page or show a success message
        header("Location: ../pages/admin_page/users.php?message=deleted");
        exit();
    } else {
        echo "Error deleting user.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
