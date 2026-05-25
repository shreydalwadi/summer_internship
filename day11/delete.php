<?php
session_start();
include("database/db.php");

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);

if($user['photo'] != "default.png"){
    unlink("uploads/photos/".$user['photo']);
}

if($user['resume']){
    unlink("uploads/resumes/".$user['resume']);
}

mysqli_query($conn,
"UPDATE users SET photo='default.png', resume='' WHERE id='$id'");

header("Location: home.php");
?>