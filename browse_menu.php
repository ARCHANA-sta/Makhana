<?php

include 'db.php';

$sql = "SELECT * FROM homemakers";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Browse Homemakers</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">
<span class="navbar-brand">
MaKhana
</span>
</div>
</nav>

<div class="container mt-4">

<h2 class="mb-4">
Available Homemakers
</h2>

<div class="row">

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="col-md-4">

<div class="card shadow mb-4">

<?php
if(!empty($row['profile_image']))
{
?>
<img
src="uploads/<?php echo $row['profile_image']; ?>"
height="220"
class="card-img-top">
<?php
}
?>

<div class="card-body">

<h4>
<?php echo $row['business_name']; ?>
</h4>

<p>
<?php echo $row['description']; ?>
</p>

<p>
<b>Address:</b>
<?php echo $row['address']; ?>
</p>

<a
href="view_homemaker_menu.php?id=<?php echo $row['user_id']; ?>"
class="btn btn-primary">

View Menu

</a>

</div>

</div>

</div>

<?php
}
?>

</div>

</div>

</body>
</html>