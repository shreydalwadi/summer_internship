<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        /* Page Background */
        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            font-family: Arial, sans-serif;
        }

        /* Main Box */
        .container{
            background:white;
            padding:40px;
            border-radius:15px;
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
            width:320px;
            text-align:center;
        }

        /* Heading */
        h2{
            margin-bottom:25px;
            color:#333;
        }

        /* Input Fields */
        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:8px;
            font-size:16px;
            outline:none;
            transition:0.3s;
        }

        input:focus{
            border-color:#4facfe;
            box-shadow:0 0 8px rgba(79,172,254,0.5);
        }

        /* Button */
        button{
            width:100%;
            padding:12px;
            margin-top:15px;
            border:none;
            border-radius:8px;
            background:#4facfe;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#008cdd;
            transform:scale(1.03);
        }
    </style>
</head>
<body>
     <div class="container">
    <h2>BMI Calculator</h2>
    <form action="data.php" method="POST">
        <form method="post">

        <input type="number" name="weight" placeholder="Weight in KG" required>

        <input type="number" name="height" placeholder="Height in CM" required>

        <button type="submit">Calculate BMI</button>

    

    </form>
</body>
</html>   