<?php 

include('../config/connectdb.php');

// Monthly sales data
$sqlMonthlySales = "SELECT MONTH(orderDate) AS month, SUM(totalPrice) AS total_sales
        FROM orders
        WHERE YEAR(orderDate) = YEAR(CURRENT_DATE())
        GROUP BY MONTH(orderDate)
        ORDER BY month";

$resultMonthlySales = $conn->query($sqlMonthlySales);

$monthlySales = [];

while ($row = $resultMonthlySales->fetch_assoc()) {
    $monthlySales[] = [
        'month' => $row['month'],
        'total_sales' => $row['total_sales']
    ];
}

// Total numbers of orders by college name
$sqlNumOrderCollege = "SELECT collegeName, COUNT(*) AS total_orders
                    FROM orders
                    GROUP BY collegeName
                    ORDER BY total_orders DESC";

$resultNumOrderCollege = $conn->query($sqlNumOrderCollege);

$numOrderCollege = [];

while ($row = $resultNumOrderCollege->fetch_assoc()) {
    $numOrderCollege[] = [
        'collegeName' => $row['collegeName'],
        'total_orders' => $row['total_orders']
    ];
}

$response = [
    'monthly_sales'=> $monthlySales,
    'num_order_college'=> $numOrderCollege
    ];

header('Content-type: application/json');
echo json_encode($response);

?>