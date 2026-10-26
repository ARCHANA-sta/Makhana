<?php

session_start();
include 'db.php';

$customer_id = $_SESSION['user_id'];

$plan_id = $_GET['plan_id'];

$plan = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM subscription_plans
         WHERE id='$plan_id'"
    )
);

$homemaker_id = $plan['homemaker_id'];


// CHECK FOR EXISTING ACTIVE SUBSCRIPTION

$check = mysqli_query(
    $conn,
    "SELECT * FROM subscriptions
     WHERE customer_id='$customer_id'
     AND plan_id='$plan_id'
     AND status='Active'"
);

if(mysqli_num_rows($check) > 0)
{
?>

<!DOCTYPE html>
<html>
<head>

<title>Already Subscribed</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="alert alert-warning">

<h3>You are already subscribed to this plan.</h3>

<a href="my_subscriptions.php"
class="btn btn-primary mt-3">

View My Subscriptions

</a>

</div>

</div>

</body>
</html>

<?php
exit();
}


// CREATE NEW SUBSCRIPTION

$start_date = date('Y-m-d');

if($plan['duration'] == 'Monthly')
{
    $end_date = date(
        'Y-m-d',
        strtotime('+30 days')
    );
}
else
{
    $end_date = date(
        'Y-m-d',
        strtotime('+7 days')
    );
}

$sql = "INSERT INTO subscriptions
(
customer_id,
homemaker_id,
plan_id,
start_date,
end_date,
status
)

VALUES
(
'$customer_id',
'$homemaker_id',
'$plan_id',
'$start_date',
'$end_date',
'Active'
)";

if(mysqli_query($conn,$sql))
{
?>

<!DOCTYPE html>
<html>
<head>

<title>Subscription Activated</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="alert alert-success">

<h3>Subscription Activated Successfully!</h3>

<a href="my_subscriptions.php"
class="btn btn-success mt-3">

View My Subscriptions

</a>

</div>

</div>

</body>
</html>

<?php
}
else
{
    echo mysqli_error($conn);
}

?>