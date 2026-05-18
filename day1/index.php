<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>

    

    <style>
        body{
            font-family: Arial, sans-serif;
            background: white;
            margin: 0;
            padding: 10px;
        }

        .container{
            width: 80%;
            margin: auto;
        }

        .box{
            background: grey;
            padding: 30px;
            margin-bottom: 20px;
            border-radius: 10px;
            border-left: 6px pink;
            box-shadow: 0 2px 8px orangered;
        }

        h1{
            color: orangered;
        }

        ul{
            padding-left: 20px;
        }

        footer{
            text-align: center;
            background:orangered;
            color: white;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body >

<?php

// Variables
$name = "Shrey Dalwadi";
$city = "Anand";
$hobby = "Traveling";

// Date & Time
$date = date("d M Y");
$time = date("h:i A");

// Dynamic Greeting
$hour = date("H");
if($hour < 4){
    $greeting = " Late Night";
}
elseif($hour < 12){
    $greeting = "Good Morning";
}
elseif($hour < 18){
    $greeting = "Good Afternoon";
}
else{
    $greeting = "Good Evening";
}

// Day Message
$day = date("l");

if($day == "Sunday" && "saturday"){
    $message = "Enjoy your weekend!";
}
else{
    $message = "Do Work That Make You Pride";
}

?>

<div class="container">

    <!-- Section 1 -->
    <div class="box">
        <h1><?php echo $greeting; ?> </h1>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>City:</strong> <?php echo $city; ?></p>
        <p><strong>Hobby:</strong> <?php echo $hobby; ?></p>
    </div>

    <!-- Section 2 -->
    <div class="box">
        <h2>Current Date & Time</h2>
        <p>Date: <?php echo $date; ?></p>
        <p>Time: <?php echo $time; ?></p>
    </div>

    <!-- Section 3 -->
    <div class="box">
        <h2>Today's Message</h2>
        <p><?php echo $message; ?></p>
    </div>

    <!-- Skills Section -->
    <div class="box">
        <h2>Skills I Want to Learn</h2>

        <ul>
            <li>mobile application</li>
            <li>ui-ux </li>
            
        </ul>
    </div>

    <!-- Footer -->
    <footer>
    © <?php echo date("Y"); ?> shrey dalwadi. All Rights Reserved.
</footer>

</div>

</body>
</html>
