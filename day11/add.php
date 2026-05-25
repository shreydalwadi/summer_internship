<?php
session_start();
include("database/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);

if(isset($_POST['upload'])){

    $photo = $user['photo'];

    // PHOTO
    if($_FILES['photo']['name']){

        if($photo != "default.png"){
            unlink("uploads/photos/".$photo);
        }

        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        move_uploaded_file($tmp,"uploads/photos/".$photo);
    }

    // RESUME 1
    $resume1 = $user['resume'];

    if($_FILES['resume1']['name']){

        if($resume1){
            unlink("uploads/resumes/".$resume1);
        }

        $resume1 = $_FILES['resume1']['name'];
        $tmp1 = $_FILES['resume1']['tmp_name'];

        move_uploaded_file($tmp1,"uploads/resumes/".$resume1);
    }

    // RESUME 2
    $resume2 = $user['resume2'];

    if($_FILES['resume2']['name']){

        if($resume2){
            unlink("uploads/resumes/".$resume2);
        }

        $resume2 = $_FILES['resume2']['name'];
        $tmp2 = $_FILES['resume2']['tmp_name'];

        move_uploaded_file($tmp2,"uploads/resumes/".$resume2);
    }

    $update = "UPDATE users SET
    photo='$photo',
    resume='$resume1',
    resume2='$resume2'
    WHERE id='$id'";

    mysqli_query($conn,$update);

    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Details</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Add Photo & Resume</h2>

<form method="POST" enctype="multipart/form-data">

<label>Upload Photo</label>
<input type="file" name="photo">

<label>Upload Resume 1</label>
<input type="file" name="resume1">

<label>Upload Resume 2</label>
<input type="file" name="resume2">

<button name="upload">Upload</button>

</form>

</div>

</body>
</html>