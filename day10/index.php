<?php

include 'config.php';

$sql = "SELECT * FROM student";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Records</title>

<style>

body{
    font-family:Arial;
    background:linear-gradient(to right,#f6f9fc,#dfe9f3);
    padding:20px;
}

h2{
    text-align:center;
    color:#ff416c;
}

.top-buttons{
    text-align:center;
    margin-bottom:20px;
}

.add-btn{
    display:inline-block;
    padding:12px 20px;
    margin:10px;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.green{
    background:linear-gradient(to right,#11998e,#38ef7d);
}

.blue{
    background:linear-gradient(to right,#396afc,#2948ff);
}

table{
    width:95%;
    margin:auto;
    border-collapse:collapse;
    background:white;
    box-shadow:0px 0px 15px rgba(0,0,0,0.2);
    border-radius:10px;
    overflow:hidden;
}

th{
    background:linear-gradient(to right,#ff416c,#ff4b2b);
    color:white;
    padding:14px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:nth-child(even){
    background:#f9f9f9;
}

.student-image{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #396afc;
}

.edit-btn{
    background:orange;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
}

.delete-btn{
    background:red;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
}

.edit-btn:hover,
.delete-btn:hover,
.add-btn:hover{
    opacity:0.9;
}

</style>

</head>

<body>

<h2>Student Management System</h2>

<div class="top-buttons">

<a href="student.php" class="add-btn green">
Add Student
</a>

<a href="search.php" class="add-btn blue">
Search Student
</a>

</div>

<table>

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Age</th>
<th>STD</th>
<th>City</th>
<th>Roll No</th>
<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['student_id']; ?></td>

<td>

<?php

$image = $row['student_image'];

if(
    empty($image)
    || $image == NULL
    || !file_exists("uploads/" . $image)
){

?>

<img src="default-avatar.png" class="student-image">

<?php

}else{

?>

<img src="uploads/<?php echo $image; ?>" class="student-image">

<?php } ?>

</td>

<td><?php echo $row['student_name']; ?></td>

<td><?php echo $row['student_age']; ?></td>

<td><?php echo $row['student_std']; ?></td>

<td><?php echo $row['city']; ?></td>

<td><?php echo $row['student_roll_no']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['student_id']; ?>" class="edit-btn">
Edit
</a>

<a href="delete.php?id=<?php echo $row['student_id']; ?>" class="delete-btn">
Delete
</a>

</td>

</tr>

<?php

}

}else{

echo "<tr><td colspan='8'>No Data Found</td></tr>";

}

?>

</table>

</body>
</html>