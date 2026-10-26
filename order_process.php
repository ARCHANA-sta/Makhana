<?php

session_start();
include 'db.php';

$customer_id = $_SESSION['user_id'];

$menu_id = $_POST['menu_id'];

$menu = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT * FROM menu WHERE id='$menu_id'")
);

$homemaker_id = $menu['homemaker_id'];

$amount = $menu['price'];

$sql = "INSERT INTO orders
(customer_id, homemaker_id, menu_id, total_amount, status)
VALUES
('$customer_id',
 '$homemaker_id',
 '$menu_id',
 '$amount',
 'Pending')";

if(mysqli_query($conn,$sql))
{
    echo "
    <h2>Order Placed Successfully!</h2>

    <a href='my_orders.php'>
    View My Orders
    </a>
    ";
}
else
{
    echo mysqli_error($conn);
}

?>