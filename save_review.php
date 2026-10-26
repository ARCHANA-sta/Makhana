<?php

session_start();
include 'db.php';

$customer_id = $_SESSION['user_id'];

$homemaker_id = $_POST['homemaker_id'];

$rating = $_POST['rating'];

$review = mysqli_real_escape_string(
$conn,
$_POST['review']
);

$sql = "INSERT INTO reviews
(customer_id, homemaker_id, rating, review)
VALUES
('$customer_id',
 '$homemaker_id',
 '$rating',
 '$review')";

if(mysqli_query($conn,$sql))
{
    header("Location: my_orders.php");
}
else
{
    echo mysqli_error($conn);
}
?>