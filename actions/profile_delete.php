<?php
include('../config/connectdb.php');

// Check if the id is set and is a number
if (isset($_GET['email'])) {
    $user_email = $_GET['email'];

    // Prepare the delete statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
    $stmt->bind_param("s", $user_email);

    if ($stmt->execute()) {
        // Redirect back to the users page or show a success message
        header("Location: ../pages/admin_page/profile.php?message=deleted");
        exit();
    } else {
        echo "Error deleting profile.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
