<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Homemaker Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">MaKhana</span>
    </div>
</nav>

<div class="container mt-4">

<div class="card p-4 shadow">

<h2>Welcome Homemaker</h2>

<p>Hello, <?php echo $_SESSION['name']; ?></p>

<hr>

<a href="create_profile.php" class="btn btn-primary mb-2">
Create / Update Profile
</a>

<a href="add_menu.php" class="btn btn-success mb-2">
Add Dish
</a>

<a href="add_subscription_plan.php"
class="btn btn-secondary mb-2">

Manage Subscription Plans

</a>

<a href="view_menu.php" class="btn btn-warning mb-2">
View My Menu
</a>

<a href="manage_orders.php" class="btn btn-info mb-2">
View Orders
</a>

<a href="manage_orders.php"
class="btn btn-info mb-2">

Manage Orders

</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</body>
</html>