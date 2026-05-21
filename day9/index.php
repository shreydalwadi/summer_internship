<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>

<title>Home</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav class="navbar navbar-custom">

<div class="container-fluid">

<div>

<a href="profile.php"
class="btn btn-primary">
Profile
</a>

<a href="logout.php"
class="btn btn-danger">
Logout
</a>

</div>

<h3 class="text-white">
FACE
</h3>

</div>

</nav>

<div class="welcome-box">

<h1>
Welcome
<?php echo $_SESSION['full_name']; ?>
</h1>

<h3 class="mt-4 text-primary">
Role :
<?php echo $_SESSION['role']; ?>
</h3>

</div>

</body>
</html>