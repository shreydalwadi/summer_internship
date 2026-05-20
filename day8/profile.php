<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#fc466b,#3f5efb);
    height:100vh;
    font-family:Arial;
}

.profile-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

.card-header{
    background:linear-gradient(to right,#ff512f,#dd2476);
    padding:20px;
}

.info{
    font-size:18px;
    margin-bottom:15px;
}

.btn-back{
    background:linear-gradient(to right,#36d1dc,#5b86e5);
    color:white;
    border:none;
}

.btn-logout{
    background:linear-gradient(to right,#ff416c,#ff4b2b);
    color:white;
    border:none;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card profile-card">

<div class="card-header text-white">
<h3>User Profile</h3>
</div>

<div class="card-body">

<p class="info">
<b>User ID:</b>
<?php echo $_SESSION['user_id']; ?>
</p>

<p class="info">
<b>Username:</b>
<?php echo $_SESSION['username']; ?>
</p>

<p class="info">
<b>Full Name:</b>
<?php echo $_SESSION['full_name']; ?>
</p>

<p class="info">
<b>Role:</b>
<?php echo $_SESSION['role']; ?>
</p>

<a href="index.php"
   class="btn btn-back">
Back
</a>

<a href="logout.php"
   class="btn btn-logout">
Logout
</a>

</div>
</div>
</div>

</body>
</html>