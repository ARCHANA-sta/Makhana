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
    <title>Customer Dashboard</title>

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

        <h2>Welcome Customer</h2>

        <p>Hello, <?php echo $_SESSION['name']; ?></p>

        <hr>

        <a href="browse_menu.php" class="btn btn-primary mb-2">
            Browse Tiffins
        </a>

        <a href="my_orders.php" class="btn btn-success mb-2">
            My Orders
        </a>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>

    </div>

</div>

</body>
</html>