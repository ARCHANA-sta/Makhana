<?php

session_start();
include 'db.php';

$menu_id = $_GET['menu_id'];

$sql = "SELECT * FROM menu WHERE id='$menu_id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<h2>Confirm Order</h2>

Dish: <?php echo $row['dish_name']; ?><br><br>

Price: ₹<?php echo $row['price']; ?><br><br>

<form action="order_process.php" method="POST">

<input type="hidden" name="menu_id" value="<?php echo $row['id']; ?>">

<button type="submit">
Confirm Order
</button>

</form>