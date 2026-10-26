<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"UPDATE subscriptions
SET status='Cancelled'
WHERE id='$id'"
);

header("Location: my_subscriptions.php");

?>