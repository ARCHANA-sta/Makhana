<?php

session_start();
include 'db.php';

$homemaker_id = $_SESSION['user_id'];

$sql = "SELECT * FROM menu WHERE homemaker_id='$homemaker_id'";

$result = mysqli_query($conn,$sql);

echo "<h2>My Menu</h2>";

while($row = mysqli_fetch_assoc($result))
{
    echo "<hr>";

    echo "<b>".$row['dish_name']."</b><br>";

    echo "₹".$row['price']."<br>";

    echo $row['description']."<br>";
}
?>