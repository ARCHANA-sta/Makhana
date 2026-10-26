<?php

session_start();

$homemaker_id = $_GET['homemaker_id'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Leave Review</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2>Leave Review</h2>

<form action="save_review.php" method="POST">

<input
type="hidden"
name="homemaker_id"
value="<?php echo $homemaker_id; ?>">

<label>Rating</label>

<select
name="rating"
class="form-control">

<option value="5">⭐⭐⭐⭐⭐</option>
<option value="4">⭐⭐⭐⭐</option>
<option value="3">⭐⭐⭐</option>
<option value="2">⭐⭐</option>
<option value="1">⭐</option>

</select>

<br>

<label>Review</label>

<textarea
name="review"
class="form-control">
</textarea>

<br>

<button class="btn btn-success">
Submit Review
</button>

</form>

</div>

</div>

</body>
</html>