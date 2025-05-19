<?php
include('../config/connectdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $phoneNum = $_POST['phoneNum'];
    $collegeName = $_POST['collegeName'];
    $roomNum = $_POST['roomNum'];
    $method = $_POST['method'];
    $totalPrice = $_POST['totalPrice'];
    $orderDate = $_POST['orderDate'];

    $sql = "UPDATE orders SET 
                name = '$name',
                phoneNum = '$phoneNum',
                collegeName = '$collegeName',
                roomNum = '$roomNum',
                method = '$method',
                totalPrice = '$totalPrice',
                orderDate = '$orderDate'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
