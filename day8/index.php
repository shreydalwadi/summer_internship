<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            padding:0;
            font-family:Arial;
            background:linear-gradient(135deg,#00c6ff,#0072ff,#7f00ff);
            height:100vh;
            overflow:hidden;
        }

        .navbar-custom{
            background:rgba(255,255,255,0.15);
            backdrop-filter:blur(10px);
            padding:15px 30px;
        }

        .welcome-box{
            width:700px;
            margin:auto;
            margin-top:120px;
            background:white;
            padding:50px;
            border-radius:25px;
            text-align:center;
            box-shadow:0 15px 40px rgba(0,0,0,0.3);
        }

        .welcome-text{
            font-size:40px;
            font-weight:bold;
            color:#333;
        }

        .name-text{
            color:#ff416c;
        }

        .btn-custom{
            border:none;
            padding:12px 25px;
            border-radius:10px;
            font-weight:bold;
            color:white;
            margin-left:10px;
        }

        .btn-profile{
            background:linear-gradient(to right,#36d1dc,#5b86e5);
        }

        .btn-logout{
            background:linear-gradient(to right,#ff416c,#ff4b2b);
        }

        .btn-custom:hover{
            transform:scale(1.05);
            transition:0.3s;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-custom">

    <div class="container-fluid">

        <h3 class="text-white">
            Session Login System
        </h3>

        <div>

            <a href="profile.php"
               class="btn btn-custom btn-profile">
               Profile
            </a>

            <a href="logout.php"
               class="btn btn-custom btn-logout">
               Logout
            </a>

        </div>

    </div>

</nav>

<div class="welcome-box">

    <h1 class="welcome-text">
        Welcome,
        <span class="name-text">
            <?php echo $_SESSION['full_name']; ?>
        </span>
    </h1>

    <p class="mt-4 fs-5 text-secondary">
        You have successfully logged into the system.
    </p>

</div>

</body>
</html>