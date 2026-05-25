<?php
session_start();
include("database/db.php");

$id = $_SESSION['user_id'];

$resume = $_FILES['resume']['name'];
$tmp = $_FILES['resume']['tmp_name'];

move_uploaded_file($tmp,"uploads/resumes/".$resume);

$sql = "UPDATE users SET resume='$resume' WHERE id='$id'";

mysqli_query($conn,$sql);

header("Location: home.php");
?>