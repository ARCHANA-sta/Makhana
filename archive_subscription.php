<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"UPDATE subscriptions
SET archived=1
WHERE id='$id'"
);

header("Location: my_subscriptions.php");

?>