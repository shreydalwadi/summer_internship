<?php
session_start();

include 'config.php';

$error = "";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM face
    WHERE username='$username'
    AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['signup_date'] = $user['signup_date'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['is_logged_in'] = true;

        header("Location: index.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="form-box">

<h2 class="title">Sign In</h2>

<p class="text-danger text-center">
<?php echo $error; ?>
</p>

<form method="POST">

<div class="mb-3">
<label>Username</label>

<input type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">
<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

</div>

<button type="submit"
name="login"
class="btn-custom">
Sign In
</button>

<a href="signup.php"
class="link-btn">
Create New Account
</a>

</form>

</div>

</div>

</body>
</html>