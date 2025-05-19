<?php 
include('../config/connectdb.php');

// Query for getting today sales
$sqlTodaySales = "  SELECT SUM(totalPrice)
                    AS today_sales
                    FROM orders
                    WHERE orderDate = CURRENT_DATE()";
$resultTodaySales = $conn->query($sqlTodaySales);
$rowTodaySales = $resultTodaySales->fetch_assoc();
$todaySales = $rowTodaySales['today_sales'];

// Query for getting yesterday sales
$sqlYesterdaySales = "  SELECT SUM(totalPrice)
                        AS yesterday_sales
                        FROM orders
                        WHERE orderDate = CURDATE() - INTERVAL 1 DAY";
$resultYesterdaySales = $conn->query($sqlYesterdaySales);
$rowYesterdaySales = $resultYesterdaySales->fetch_assoc();
$yesterdaySales = $rowYesterdaySales['yesterday_sales'];

// If there are no sales, SUM() will return null, so set to 0
$todaySales = $rowTodaySales['today_sales'] ?? 0;
$yesterdaySales = $rowYesterdaySales['yesterday_sales'] ?? 0;

header('Content-Type: application/json');
echo json_encode([
    'today_sales' => $todaySales,
    'yesterday_sales' => $yesterdaySales
]);

?>