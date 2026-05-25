<?php
include("database/db.php");

if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name,username,password,email)
            VALUES('$name','$username','$password','$email')";

    mysqli_query($conn,$sql);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>Create Account</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name" required>

<input type="text" name="username" placeholder="Username" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="signup">Signup</button>

</form>

<p>
Already have account?
<a href="login.php">Login</a>
</p>

</div>

</body>
</html>