<?php

include 'config.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $std = $_POST['std'];
    $city = $_POST['city'];
    $roll_no = $_POST['roll_no'];

    // DEFAULT IMAGE
    $imageName = "";

    // CHECK IMAGE
    if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['name'] != ""){

        $allowedExtensions = ['jpg','jpeg','png','webp'];

        $maxSize = 2 * 1024 * 1024;

        $fileName = $_FILES['profile_photo']['name'];

        $fileSize = $_FILES['profile_photo']['size'];

        $tmpName = $_FILES['profile_photo']['tmp_name'];

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // VALIDATION
        if(in_array($extension, $allowedExtensions)){

            if($fileSize <= $maxSize){

                if(getimagesize($tmpName) !== false){

                    $newFileName = "profile_" . uniqid() . "." . $extension;

                    $targetPath = "uploads/" . $newFileName;

                    if(move_uploaded_file($tmpName, $targetPath)){

                        $imageName = $newFileName;

                    }
                }
            }
        }
    }

    $sql = "INSERT INTO student
    (student_name, student_image, student_age, city, student_std, student_roll_no)

    VALUES
    ('$name','$imageName','$age','$city','$std','$roll_no')";

    $result = mysqli_query($conn,$sql);

    if($result){

        header("Location:index.php");

    }else{

        echo "Data Not Inserted";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Student</title>

<style>

body{
    font-family:Arial;
    background:linear-gradient(to right,#74ebd5,#ACB6E5);
}

.form-box{
    width:420px;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0px 0px 15px rgba(0,0,0,0.3);
}

h2{
    text-align:center;
    color:#ff416c;
}

input{
    width:100%;
    padding:12px;
    margin-top:12px;
    border-radius:8px;
    border:1px solid #ccc;
}

button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:8px;
    background:linear-gradient(to right,#ff416c,#ff4b2b);
    color:white;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    opacity:0.9;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Add Student</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Enter Name" required>

<input type="number" name="age" placeholder="Enter Age" required>

<input type="text" name="std" placeholder="Enter STD" required>

<input type="text" name="city" placeholder="Enter City" required>

<input type="text" name="roll_no" placeholder="Enter Roll Number" required>

<input type="file" name="profile_photo">

<button type="submit" name="submit">
Add Student
</button>

</form>

</div>

</body>
</html>