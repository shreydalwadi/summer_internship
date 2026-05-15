<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <nav>
        <a href="index.php"
        class="<?php echo ($page == 'home') ? 'active' : ''; ?>">
        Home
        </a>

        <a href="students.php"
        class="<?php echo ($page == 'students') ? 'active' : ''; ?>">
        Students
        </a>

        <a href="courses.php"
        class="<?php echo ($page == 'courses') ? 'active' : ''; ?>">
        Courses
        </a>

        <a href="contact.php"
        class="<?php echo ($page == 'contact') ? 'active' : ''; ?>">
        Contact
        </a>
    </nav>
</header>

<div class="container">