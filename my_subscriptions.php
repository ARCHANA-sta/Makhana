<?php

session_start();
include 'db.php';

$customer_id = $_SESSION['user_id'];

$today = date('Y-m-d');

mysqli_query(
$conn,
"UPDATE subscriptions
SET status='Expired'
WHERE end_date < '$today'
AND status='Active'"
);

$sql = "
SELECT
subscriptions.*,
subscription_plans.plan_name,
subscription_plans.price,
homemakers.business_name

FROM subscriptions

LEFT JOIN subscription_plans
ON subscriptions.plan_id = subscription_plans.id

LEFT JOIN homemakers
ON subscriptions.homemaker_id = homemakers.user_id

WHERE subscriptions.customer_id='$customer_id'
AND subscriptions.archived=0

ORDER BY subscriptions.id DESC
";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>My Subscriptions</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">🍱 MaKhana</span>
    </div>
</nav>

<div class="container mt-4">

<h2 class="mb-4">My Subscriptions</h2>

<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<div class="card shadow mb-3">

<div class="card-body">

<h4>
<?php echo $row['business_name']; ?>
</h4>

<hr>

<p>
<b>Plan:</b>
<?php echo $row['plan_name']; ?>
</p>

<p>
<b>Price:</b>
₹<?php echo $row['price']; ?>
</p>

<p>
<b>Start Date:</b>
<?php echo $row['start_date']; ?>
</p>

<p>
<b>End Date:</b>
<?php echo $row['end_date']; ?>
</p>

<p>
<b>Status:</b>

<?php

$badge = "bg-success";

if($row['status']=="Expired")
{
    $badge = "bg-warning";
}

if($row['status']=="Cancelled")
{
    $badge = "bg-danger";
}

?>

<span class="badge <?php echo $badge; ?>">
<?php echo $row['status']; ?>
</span>

</p>

<?php
if($row['status'] == 'Active')
{
?>
    <a
    href="cancel_subscription.php?id=<?php echo $row['id']; ?>"
    class="btn btn-danger">

    Cancel Subscription

    </a>
<?php
}
?>

<?php
if(
$row['status']=="Cancelled"
||
$row['status']=="Expired"
)
{
?>
    <a
    href="archive_subscription.php?id=<?php echo $row['id']; ?>"
    class="btn btn-secondary">

    Archive

    </a>
<?php
}
?>

</div>

</div>

<?php
    }
}
else
{
    echo "
    <div class='alert alert-info'>
    No subscriptions found.
    </div>
    ";
}
?>

<div class="mt-3">

<a href="archived_subscriptions.php"
class="btn btn-dark">

View Archived Subscriptions

</a>

<a href="customer_dashboard.php"
class="btn btn-primary">

Back to Dashboard

</a>

</div>

</div>

</body>
</html>