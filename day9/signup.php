<?php
include 'config.php';

$msg = "";

if(isset($_POST['signup']))
{
    $name     = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    $role     = $_POST['role'];

    $query = "INSERT INTO face
    (full_name,username,password,email,role)
    VALUES
    ('$name','$username','$password','$email','$role')";

    if(mysqli_query($conn,$query))
    {
        $msg = "Signup Successful";
    }
    else
    {
        $msg = "Signup Failed";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Signup</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="form-box">

<h2 class="title">Create Account</h2>

<p class="text-center text-success">
<?php echo $msg; ?>
</p>

<form method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text"
name="full_name"
class="form-control"
required>
</div>

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

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Select Role</label>

<select name="role"
class="form-control"
required>

<option value="">Choose Role</option>
<option value="admin">Admin</option>
<option value="user">User</option>

</select>

</div>

<button type="submit"
name="signup"
class="btn-custom">
Signup
</button>

<a href="login.php"
class="link-btn">
Already Have Account? Sign In
</a>

</form>

</div>

</div>

</body>
</html>   




