<?php

include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$sql = "INSERT INTO users
(name,email,phone,password,role)
VALUES
('$name','$email','$phone','$password','$role')";

if(mysqli_query($conn,$sql)){
    echo "Registration Successful!";
}
else{
    echo "Error: " . mysqli_error($conn);
}

?>