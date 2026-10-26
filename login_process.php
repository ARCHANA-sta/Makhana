<?php

session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password']))
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'customer')
        {
            header("Location: customer_dashboard.php");
        }
        else if($user['role'] == 'homemaker')
        {
            header("Location: homemaker_dashboard.php");
        }

        exit();
    }
    else
    {
        echo "Invalid Password!";
    }
}
else
{
    echo "User Not Found!";
}

?>