<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-6">

<div class="card shadow p-4">

<h2 class="text-center">
MaKhana Registration
</h2>

<form action="register_process.php"
method="POST">

<label>Name</label>

<input type="text"
name="name"
class="form-control"
required>

<br>

<label>Email</label>

<input type="email"
name="email"
class="form-control"
required>

<br>

<label>Phone</label>

<input type="text"
name="phone"
class="form-control"
required>

<br>

<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

<br>

<label>Role</label>

<select name="role"
class="form-control">

<option value="customer">
Customer
</option>

<option value="homemaker">
Homemaker
</option>

</select>

<br>

<button class="btn btn-success w-100">
Register
</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>