<!DOCTYPE html>
<html>
<head>

<title>Add Dish</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2>Add New Dish</h2>

<form action="add_menu_process.php"
method="POST"
enctype="multipart/form-data">

<label>Dish Name</label>

<input type="text"
name="dish_name"
class="form-control"
required>

<br>

<label>Price</label>

<input type="number"
name="price"
class="form-control"
required>

<br>

<label>Description</label>

<textarea
name="description"
class="form-control">
</textarea>

<br>

<label>Dish Image</label>

<input type="file"
name="image"
class="form-control">

<br>

<button class="btn btn-success">
Add Dish
</button>

</form>

</div>

</div>

</body>
</html>