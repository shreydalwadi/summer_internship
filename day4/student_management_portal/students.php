<?php
$page = "students";

include_once 'includes/functions.php';
include_once 'includes/header.php';
?>

<h1>Students Page</h1>

<?php

displayStudent("Shrey Dalwadi", "Computer Science");

displayStudent("jhon devis", "Information Technology");

displayStudent("Amit Verma", "Mechanical Engineering");

?>

<?php
include_once 'includes/footer.php';
?>