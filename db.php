<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "makhana"
);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>