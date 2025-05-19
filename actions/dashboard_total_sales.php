<?php 
include('../config/connectdb.php');

// Query for getting total sales
$sqlTotalSales = "  SELECT SUM(totalPrice) 
                    AS total_sales 
                    FROM orders";
$resultTotalsales = $conn->query($sqlTotalSales);
$rowTotalSales = $resultTotalsales->fetch_assoc();
$totalSales = $rowTotalSales['total_sales'];

// Query for getting last month sales
$sqlLastMonthSales = "  SELECT SUM(totalPrice) 
                        AS last_month_sales 
                        FROM orders 
                        WHERE MONTH(orderDate) = MONTH(CURRENT_DATE()) - 1
                        AND YEAR(orderDate) = YEAR(CURRENT_DATE())";
$resultLastMonthSales = $conn->query($sqlLastMonthSales);
$rowLastMonthSales = $resultLastMonthSales->fetch_assoc();
$lastMonthSales = $rowLastMonthSales['last_month_sales'];

// Query for getting current month sales
$sqlCurrentMonthSales = "   SELECT SUM(totalPrice) 
                            AS current_month_sales 
                            FROM orders 
                            WHERE MONTH(orderDate) = MONTH(CURRENT_DATE())
                            AND YEAR(orderDate) = YEAR(CURRENT_DATE())";
$resultCurrentMonthSales = $conn->query($sqlCurrentMonthSales);
$rowCurrentMonthSales = $resultCurrentMonthSales->fetch_assoc();
$currentMonthSales = $rowCurrentMonthSales['current_month_sales'];

header('Content-Type: application/json');
echo json_encode([
    'total_sales' => $totalSales,
    'last_month_sales' => $lastMonthSales,
    'current_month_sales' => $currentMonthSales
]);

?>