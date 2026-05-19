<?php

include 'config.php';

$id = $_GET['id'];

// Fetch existing student data
$sql = "SELECT * FROM student WHERE student_id = '$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


// Update record
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $std = $_POST['std'];
    $city = $_POST['city'];
    $roll_no = $_POST['roll_no'];

    $update_sql = "UPDATE student SET

        student_name = '$name',
        student_age = '$age',
        student_std = '$std',
        city = '$city',
        student_roll_no = '$roll_no'

        WHERE student_id = '$id'
    ";

    $update_result = mysqli_query($conn, $update_sql);

    if($update_result){

        header("Location: index.php");

    }else{

        echo "Record not updated";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Student</title>

    <style>

        body{
            font-family: Arial;
            background: whitesmoke;
        }

        .form-box{
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: orange;
            color: white;
            border: none;
        }

    </style>

</head>

<body>

<div class="form-box">

    <h2>Edit Student</h2>

    <form method="POST">

        <input type="text" name="name"
        value="<?php echo $row['student_name']; ?>" required>

        <input type="number" name="age"
        value="<?php echo $row['student_age']; ?>" required>

        <input type="text" name="std"
        value="<?php echo $row['student_std']; ?>" required>

        <input type="text" name="city"
        value="<?php echo $row['city']; ?>" required>

        <input type="text" name="roll_no"
        value="<?php echo $row['student_roll_no']; ?>" required>

        <button type="submit" name="update">Update Student</button>

    </form>

</div>

</body>
</html>