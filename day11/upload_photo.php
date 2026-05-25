<?php
session_start();
include("database/db.php");

$id = $_SESSION['user_id'];

$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];

move_uploaded_file($tmp,"uploads/photos/".$photo);

$sql = "UPDATE users SET photo='$photo' WHERE id='$id'";

mysqli_query($conn,$sql);

header("Location: home.php");
?>