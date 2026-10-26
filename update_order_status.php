<?php

include 'db.php';

$order_id = $_GET['id'];

$status = $_GET['status'];

mysqli_query(
$conn,
"UPDATE orders
SET status='$status'
WHERE id='$order_id'"
);

header("Location: manage_orders.php");

?>
