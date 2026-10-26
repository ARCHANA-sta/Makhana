<?php

include 'db.php';

$homemaker_id = $_GET['id'];

$rating_query = mysqli_query(
$conn,
"SELECT AVG(rating) AS avg_rating
 FROM reviews
 WHERE homemaker_id='$homemaker_id'"
);

$rating_data = mysqli_fetch_assoc($rating_query);

$avg_rating = round($rating_data['avg_rating'],1);

$sql = "SELECT * FROM menu
WHERE homemaker_id='$homemaker_id'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>

<div class="container mt-4">

<h2>Menu</h2>

<h4 class="text-warning mb-4">

<hr>

<h3>Subscription Plans</h3>

<?php

$plans = mysqli_query(
$conn,
"SELECT * FROM subscription_plans
WHERE homemaker_id='$homemaker_id'"
);

while($plan = mysqli_fetch_assoc($plans))
{
?>

<div class="card mb-3">

<div class="card-body">

<h4>
<?php echo $plan['plan_name']; ?>
</h4>

<p>
<?php echo $plan['description']; ?>
</p>

<p>
₹<?php echo $plan['price']; ?>
</p>

<p>
<?php echo $plan['duration']; ?>
</p>

<a
href="subscribe.php?plan_id=<?php echo $plan['id']; ?>"
class="btn btn-success">

Subscribe

</a>

</div>

</div>

<?php
}
?>

⭐ Average Rating:

<?php
if($avg_rating)
{
    echo $avg_rating."/5";
}
else
{
    echo "No Ratings Yet";
}
?>

</h4>

<div class="row">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="col-md-4">

<div class="card shadow mb-4">

<?php
if(!empty($row['image']))
{
?>

<img
src="uploads/<?php echo $row['image']; ?>"
height="250"
class="card-img-top">

<?php
}
?>

<div class="card-body">

<h4>
<?php echo $row['dish_name']; ?>
</h4>

<p>
₹<?php echo $row['price']; ?>
</p>

<p>
<?php echo $row['description']; ?>
</p>

<a
href="place_order.php?menu_id=<?php echo $row['id']; ?>"
class="btn btn-success">

Order Now

</a>

</div>

</div>

</div>

<?php
}
?>

</div>

</div>
<hr>

<h3 class="mt-5">
Customer Reviews
</h3>

<?php

$reviews = mysqli_query(
$conn,
"SELECT * FROM reviews
 WHERE homemaker_id='$homemaker_id'
 ORDER BY id DESC"
);

while($review = mysqli_fetch_assoc($reviews))
{
?>

<div class="card mb-3">

<div class="card-body">

<h5>

<?php
echo str_repeat("⭐",$review['rating']);
?>

</h5>

<p>

<?php
echo $review['review'];
?>

</p>

</div>

</div>

<?php
}
?>

</body>
</html>