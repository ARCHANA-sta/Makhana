<?php

session_start();
include 'db.php';

$homemaker_id = $_SESSION['user_id'];

$dish_name = mysqli_real_escape_string(
$conn,
$_POST['dish_name']
);

$price = $_POST['price'];

$description = mysqli_real_escape_string(
$conn,
$_POST['description']
);

$image_name = "";

if(isset($_FILES['image']) &&
$_FILES['image']['name'] != "")
{
$image_name =
time()."_".$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
"uploads/".$image_name
);
}

$sql = "INSERT INTO menu
(homemaker_id,dish_name,price,description,image)
VALUES
('$homemaker_id',
'$dish_name',
'$price',
'$description',
'$image_name')";

if(mysqli_query($conn,$sql))
{
echo "Dish Added Successfully!";
}
else
{
echo mysqli_error($conn);
}

?>