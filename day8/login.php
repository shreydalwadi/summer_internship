<?php
session_start();
include 'config.php';

$error = '';

if(isset($_POST['login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users
              WHERE username='$username'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_assoc($result);

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['is_logged_in'] = true;

        if(isset($_POST['remember']))
        {
            setcookie(
                'remember_username',
                $username,
                time() + (86400 * 7)
            );
        }

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
    <title>Login System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg,#6a11cb,#2575fc,#ff6a00);
            background-size:400% 400%;
            animation:gradientBG 10s ease infinite;
            font-family:Arial;
        }

        @keyframes gradientBG{
            0%{background-position:0% 50%;}
            50%{background-position:100% 50%;}
            100%{background-position:0% 50%;}
        }

        .login-box{
            width:400px;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.3);
        }

        .login-title{
            text-align:center;
            font-weight:bold;
            margin-bottom:25px;
            color:#333;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .btn-login{
            width:100%;
            border:none;
            padding:12px;
            border-radius:10px;
            font-size:18px;
            font-weight:bold;
            background:linear-gradient(to right,#ff416c,#ff4b2b);
            color:white;
            transition:0.3s;
        }

        .btn-login:hover{
            transform:scale(1.03);
            background:linear-gradient(to right,#2575fc,#6a11cb);
        }

        .error-msg{
            color:red;
            text-align:center;
            margin-bottom:15px;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2 class="login-title">User Login</h2>

    <?php
    if($error != '')
    {
        echo "<div class='error-msg'>$error</div>";
    }
    ?>

    <form method="POST">

        <div class="mb-3">
            <label>Username</label>

            <input type="text"
                   name="username"
                   class="form-control"
                   placeholder="Enter Username"
                   required>
        </div>

        <div class="mb-3">
            <label>Password</label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter Password"
                   required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox"
                   name="remember"
                   class="form-check-input">

            <label class="form-check-label">
                Remember Me
            </label>
        </div>

        <button type="submit"
                name="login"
                class="btn-login">
            Login
        </button>

    </form>

</div>

</body>
</html>