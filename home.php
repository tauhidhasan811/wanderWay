<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="Admin/css/home_css.css">

</head>
<body>

<header>
    <h1>Welcome to WanterWay</h1>
</header>
<nav>
    <a href="" class="a">Home</a>
    <a href="about.php" class="a">About</a>
    <a href="services.php" class="a">Services</a>
    <a href="#" class="a">Contact</a>
    <?php
    include ('Admin/control/home_button_control.php');
    ?>
    

</nav>

<script src="Admin/js/home.js"></script>
<?php include('Admin/control/home_control.php'); ?>

<footer>
    <p>&copy; 2025 WanderWay. All rights reserved.</p>
</footer>

</body>
</html>
