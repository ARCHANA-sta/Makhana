<?php

session_start();
include 'db.php';

$homemaker_id = $_SESSION['user_id'];

$sql = "

SELECT
orders.*,
users.name,
menu.dish_name

FROM orders

LEFT JOIN users
ON orders.customer_id = users.id

LEFT JOIN menu
ON orders.menu_id = menu.id

WHERE orders.homemaker_id='$homemaker_id'

ORDER BY orders.id DESC

";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Manage Orders</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Incoming Orders</h2>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<div class="card shadow mb-3">

<div class="card-body">

<h4>Order #<?php echo $row['id']; ?></h4>

<p>
<b>Customer:</b>
<?php echo $row['name']; ?>
</p>

<p>
<b>Dish:</b>
<?php echo $row['dish_name']; ?>
</p>

<p>
<b>Amount:</b>
₹<?php echo $row['total_amount']; ?>
</p>

<p>
<b>Status:</b>
<?php echo $row['status']; ?>
</p>

<a
href="update_order_status.php?id=<?php echo $row['id']; ?>&status=Accepted"
class="btn btn-success">

Accept

</a>

<a
href="update_order_status.php?id=<?php echo $row['id']; ?>&status=Rejected"
class="btn btn-danger">

Reject

</a>

<a
href="update_order_status.php?id=<?php echo $row['id']; ?>&status=Delivered"
class="btn btn-primary">

Delivered

</a>

</div>

</div>

<?php
    }
}
else
{
    echo "<div class='alert alert-info'>No orders received yet.</div>";
}
?>

</div>

</body>
</html>