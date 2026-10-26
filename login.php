<!DOCTYPE html>
<html>
<head>

<title>MaKhana Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow p-4">

<h2 class="text-center">Login</h2>

<form action="login_process.php" method="POST">

<label>Email</label>

<input type="email"
name="email"
class="form-control"
required>

<br>

<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

<br>

<button class="btn btn-primary w-100">
Login
</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>