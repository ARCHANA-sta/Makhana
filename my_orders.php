<?php

session_start();
include 'db.php';

$customer_id = $_SESSION['user_id'];

$sql = "
SELECT
    orders.*,
    menu.dish_name,
    homemakers.business_name

FROM orders

LEFT JOIN menu
ON orders.menu_id = menu.id

LEFT JOIN homemakers
ON orders.homemaker_id = homemakers.user_id

WHERE orders.customer_id='$customer_id'

ORDER BY orders.id DESC
";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>My Orders</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">🍱 MaKhana</span>
    </div>
</nav>

<div class="container mt-4">

<h2 class="mb-4">My Orders</h2>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<div class="card mb-4 shadow">

<div class="card-body">

<h4>
Order #<?php echo $row['id']; ?>
</h4>

<hr>

<p>
<b>Kitchen:</b>
<?php echo $row['business_name'] ?: "Not Available"; ?>
</p>

<p>
<b>Dish:</b>
<?php echo $row['dish_name'] ?: "Not Available"; ?>
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
href="add_review.php?homemaker_id=<?php echo $row['homemaker_id']; ?>"
class="btn btn-warning">

Leave Review

</a>

</div>

</div>

<?php
    }
}
else
{
    echo "
    <div class='alert alert-info'>
    No orders found.
    </div>
    ";
}
?>

<a href="customer_dashboard.php" class="btn btn-primary">
Back to Dashboard
</a>

</div>

</body>
</html>