<?php

function displayStudent($name, $course)
{
    // Random ID
    $id = rand(1000, 9999);

    // String Functions
    $upperName = strtoupper($name);
    $courseLower = strtolower($course);

    echo "
    <div class='card'>
        <h3>$upperName</h3>
        <p>Student ID: $id</p>
        <p>Course: $courseLower</p>
    </div>
    ";
}

?>