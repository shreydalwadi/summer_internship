<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card profile-card">

<div class="card-header text-white">

<h2>User Profile</h2>

</div>

<div class="card-body">

<p><b>Name :</b>
<?php echo $_SESSION['full_name']; ?>
</p>

<p><b>Username :</b>
<?php echo $_SESSION['username']; ?>
</p>

<p><b>Password :</b>
<?php echo $_SESSION['password']; ?>
</p>

<p><b>Email :</b>
<?php echo $_SESSION['email']; ?>
</p>

<p><b>Role :</b>
<?php echo $_SESSION['role']; ?>
</p>

<p><b>Signup Date :</b>
<?php echo $_SESSION['signup_date']; ?>
</p>

<a href="index.php"
class="btn btn-primary">
Back
</a>

<a href="logout.php"
class="btn btn-danger">
Logout
</a>

</div>

</div>

</div>

</body>
</html>