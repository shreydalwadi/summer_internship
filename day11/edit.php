<?php
session_start();
include("database/db.php");

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn,
    "UPDATE users SET
    name='$name',
    email='$email'
    WHERE id='$id'");

    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Profile</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="main-container">

<div class="form-card">

<h1>Edit Profile</h1>

<form method="POST">

<input type="text"
name="name"
value="<?php echo $user['name']; ?>"
required>

<input type="email"
name="email"
value="<?php echo $user['email']; ?>"
required>

<button name="update">
Update
</button>

</form>

</div>

</div>

</body>
</html>