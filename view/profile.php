<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile</title>
    <link rel="stylesheet" href="../css/profile_design.css">
</head>
<body>
<h1>Profile</h1>
    <?php 
        include('../control/profile_control.php'); // This script fetches and displays profile data
    ?>
    <form action="show.php" method="post">
        <button type="submit" name="show">Show data</button>
    </form>
    <!-- Redirect to the update form -->
    <form action="update.php" method="post">
        <button type="submit">Edit Profile</button>
    </form>
    <form action="" method="post">
        <button type="submit" name=delete>Delete Profile</button>
    </form>
    <form action="../control/logout_contron.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    </form>
    <form action="package.php" method="post">
        <button type="submit" name="package">Package</button>
    </form>
</body>
</html>
