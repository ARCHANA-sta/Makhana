<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

if(isset($_POST['submit']))
{
    $business_name = mysqli_real_escape_string(
    $conn,
    $_POST['business_name']
);

$address = mysqli_real_escape_string(
    $conn,
    $_POST['address']
);


$description = mysqli_real_escape_string(
    $conn,
    $_POST['description']
);

    $image_name = "";

    if(isset($_FILES['profile_image']) &&
       $_FILES['profile_image']['name'] != "")
    {
        $image_name = time() . "_" . $_FILES['profile_image']['name'];

        move_uploaded_file(
            $_FILES['profile_image']['tmp_name'],
            "uploads/" . $image_name
        );
    }

    // Check if profile exists
    $check = mysqli_query(
        $conn,
        "SELECT * FROM homemakers WHERE user_id='$user_id'"
    );

    if(mysqli_num_rows($check) > 0)
    {
        if($image_name != "")
        {
            $sql = "UPDATE homemakers SET
        business_name='$business_name',
        address='$address',
        city='$city',
        description='$description',
        profile_image='$image_name'
        WHERE user_id='$user_id'";
        }
        else
        {
            $sql = "UPDATE homemakers SET
        business_name='$business_name',
        address='$address',
        city='$city',
        description='$description'
        WHERE user_id='$user_id'";
        }
    }
    else
    {
        $sql = "INSERT INTO homemakers
        (user_id,business_name,address,city,description,profile_image)
        VALUES
        ('$user_id',
         '$business_name',
         '$address',
         '$city',
         '$description',
         '$image_name')";
    }

    if(mysqli_query($conn,$sql))
    {
        echo "<p style='color:green;'>
              Profile Saved Successfully!
              </p>";
    }
}

$profile = mysqli_query(
    $conn,
    "SELECT * FROM homemakers WHERE user_id='$user_id'"
);

$data = mysqli_fetch_assoc($profile);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homemaker Profile</title>
</head>
<body>

<h2>Homemaker Profile</h2>

<form method="POST" enctype="multipart/form-data">

    Business Name:<br>
    <input
        type="text"
        name="business_name"
        value="<?php echo $data['business_name'] ?? ''; ?>"
        required>
    <br><br>

    Address:<br>
    <input
        type="text"
        name="address"
        value="<?php echo $data['address'] ?? ''; ?>"
        required>
    <br><br>

    City:<br>

<input
type="text"
name="city"
value="<?php echo $data['city'] ?? ''; ?>"
required>

<br><br>

    Description:<br>
    <textarea name="description"><?php echo $data['description'] ?? ''; ?></textarea>
    <br><br>

    Profile Image:<br>
    <input type="file" name="profile_image">
    <br><br>

    <?php
    if(!empty($data['profile_image']))
    {
        echo "<img src='uploads/".$data['profile_image']."'
              width='150'><br><br>";
    }
    ?>

    <button type="submit" name="submit">
        Save Profile
    </button>

</form>

<br><br>

<a href="homemaker_dashboard.php">
    Back to Dashboard
</a>

</body>
</html>