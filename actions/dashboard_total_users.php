<?php
include('../config/connectdb.php');

$sql = "SELECT COUNT(*) AS total_users FROM users";
$result = $conn->query($sql); // This will return a table column (total_users), row (number user tu)

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Returns one row from the result set where the column names become the keys of the array.
    $totalUser = $row['total_users'];
}

// Set header and return JSON (so that we can fetch it in js)
header('Content-Type: application/json');
echo json_encode(['total_users' => $totalUser]); // This will return e.g: {"total_users":123}

?>