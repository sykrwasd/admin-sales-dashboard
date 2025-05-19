<?php 
include('../config/connectdb.php');

// Query for getting total orders
$sqlTotalOrders = "SELECT COUNT(*) AS total_orders FROM orders";
$resultTotalOrders = $conn->query($sqlTotalOrders);
$rowTotalOrders = $resultTotalOrders->fetch_assoc();
$totalOrders = $rowTotalOrders['total_orders'];

// Query for getting last month orders
$sqlLastMonthOrders = "
    SELECT COUNT(*) AS last_month_orders
    FROM orders 
    WHERE MONTH(orderDate) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)
    AND YEAR(orderDate) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)";
$resultLastMonthOrders = $conn->query($sqlLastMonthOrders);
$rowLastMonthOrders = $resultLastMonthOrders->fetch_assoc();
$lastMonthOrders = $rowLastMonthOrders['last_month_orders'];

// Query for getting current month orders
$sqlCurrentMonthOrders = "
    SELECT COUNT(*) AS current_month_orders
    FROM orders 
    WHERE MONTH(orderDate) = MONTH(CURRENT_DATE())
    AND YEAR(orderDate) = YEAR(CURRENT_DATE())";
$resultCurrentMonthOrders = $conn->query($sqlCurrentMonthOrders);
$rowCurrentMonthOrders = $resultCurrentMonthOrders->fetch_assoc();
$currentMonthOrders = $rowCurrentMonthOrders['current_month_orders'];

header('Content-Type: application/json');
echo json_encode([
    'total_orders' => $totalOrders,
    'last_month_orders' => $lastMonthOrders,
    'current_month_orders' => $currentMonthOrders
]);

?>
