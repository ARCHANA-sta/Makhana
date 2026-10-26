<?php
session_start();
include 'db.php';

if(isset($_POST['submit']))
{
    $homemaker_id = $_SESSION['user_id'];

    $plan_name = mysqli_real_escape_string(
        $conn,
        $_POST['plan_name']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $price = $_POST['price'];

    $duration = $_POST['duration'];

    $sql = "INSERT INTO subscription_plans
    (homemaker_id,plan_name,description,price,duration)
    VALUES
    ('$homemaker_id',
     '$plan_name',
     '$description',
     '$price',
     '$duration')";

    mysqli_query($conn,$sql);

    echo "Plan Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Subscription Plan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2>Create Subscription Plan</h2>

<form method="POST">

<label>Plan Name</label>

<input
type="text"
name="plan_name"
class="form-control"
required>

<br>

<label>Description</label>

<textarea
name="description"
class="form-control">
</textarea>

<br>

<label>Price</label>

<input
type="number"
name="price"
class="form-control"
required>

<br>

<label>Duration</label>

<select
name="duration"
class="form-control">

<option>Weekly</option>
<option>Monthly</option>

</select>

<br>

<button
name="submit"
class="btn btn-success">

Create Plan

</button>

</form>

</div>

</div>

</body>
</html>