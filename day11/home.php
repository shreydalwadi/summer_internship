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
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="profile-card">

<h1>User Dashboard</h1>

<img src="uploads/photos/<?php echo $user['photo']; ?>" class="profile-img">

<h2><?php echo $user['name']; ?></h2>

<p><?php echo $user['email']; ?></p>

<!-- Resume 1 -->

<?php
if($user['resume']){
?>

<div class="resume-box">

<a href="uploads/resumes/<?php echo $user['resume']; ?>" target="_blank">

Resume 1

</a>

</div>

<?php
}
?>

<!-- Resume 2 -->

<?php
if($user['resume2']){
?>

<div class="resume-box">

<a href="uploads/resumes/<?php echo $user['resume2']; ?>" target="_blank">

Resume 2

</a>

</div>

<?php
}
?>

<div class="footer-buttons">

<a href="add.php">
<button class="add-btn">Add</button>
</a>

<a href="edit.php">
<button>Edit</button>
</a>

<a href="logout.php">
<button class="logout-btn">Logout</button>
</a>

</div>

</div>

</body>
</html>