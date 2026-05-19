<?php

include 'config.php';

$result = "";

if(isset($_POST['search'])){

    $search = $_POST['search_data'];

    $sql = "SELECT * FROM student

            WHERE student_name LIKE '%$search%'

            OR city LIKE '%$search%'

            OR student_roll_no LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Search Student</title>

    <style>

        body{
            font-family: Arial;
            background: whitesmoke;
            padding: 20px;
        }

        h2{
            text-align: center;
            color: blue;
        }

        .search-box{
            width: 500px;
            margin: auto;
            margin-bottom: 20px;
            text-align: center;
        }

        input{
            width: 70%;
            padding: 10px;
        }

        button{
            padding: 10px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        .back-btn{
            background: green;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        table{
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th{
            background: #007bff;
            color: white;
            padding: 12px;
        }

        td{
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        tr:nth-child(even){
            background: #f2f2f2;
        }

    </style>

</head>

<body>

<h2>Search Student</h2>

<div class="search-box">

    <a href="index.php" class="back-btn">
        Back
    </a>

    <form method="POST" style="margin-top:20px;">

        <input type="text"
               name="search_data"
               placeholder="Search by Name, City or Roll Number"
               required>

        <button type="submit" name="search">
            Search
        </button>

    </form>

</div>

<?php

if(isset($_POST['search'])){

?>

<table>

    <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>STD</th>
        <th>City</th>
        <th>Roll No</th>

    </tr>

<?php

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

<tr>

    <td><?php echo $row['student_id']; ?></td>

    <td><?php echo $row['student_name']; ?></td>

    <td><?php echo $row['student_age']; ?></td>

    <td><?php echo $row['student_std']; ?></td>

    <td><?php echo $row['city']; ?></td>

    <td><?php echo $row['student_roll_no']; ?></td>

</tr>

<?php

    }

}else{

    echo "<tr><td colspan='6'>No Data Found</td></tr>";
}

?>

</table>

<?php

}

?>

</body>
</html>