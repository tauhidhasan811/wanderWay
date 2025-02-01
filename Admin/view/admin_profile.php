<?php 
session_start();
include('../control/profile_control.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/profile_style.css">
    <script src="../js/profile.js"></script>
</head>
<body>


<div class="profile-header">
    <div class="profile-left">
        <div class="profile-picture">
            <img src="<?php echo $_SESSION['pp']; ?>" alt="Profile Picture">
        </div>
    </div>
    <div class="profile-right">
        <h1><?php  echo $_SESSION['name']; ?></h1> 
        

        <p class="role"><?php echo $_SESSION['role']; ?></p>
     
    </div>
</div>
<div>
    <nav class="logout-section">
        <form action="" method="POST" onsubmit="return handleFormSubmit(event);">
            <?php include('../control/button.php');?>
            <button type="submit" class="home" name="home">Home</button>
            <button type="button" class="search" name="search" onclick='page_change()'>Search</button>
            <button type="submit" class="edit" name="edit">Edit profile</button>
            <button type="submit" class="delete" name="delete">Delete account</button>
       </form>
    </nav>
</div>

<div class="profile-details">
    <table>
        <tr>
            <th>Username</th>
            <td><?php echo $_SESSION['name']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $_SESSION['email']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $_SESSION['gender']; ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td><?php echo $_SESSION['dob']; ?></td>
        </tr>
        <tr>
            <th>Joined</th>
            <td><?php echo $_SESSION['joindate']; ?></td>
        </tr>
        <tr>
            <th>NID</th>
            <td><?php echo $_SESSION['nid']; ?></td>
        </tr>
        <tr>
            <th>Number</th>
            <td><?php echo $_SESSION['number']; ?></td>
        </tr>
        <tr>
            <th>Work start time</th>
            <td><?php echo $_SESSION['starttime']; ?></td>
        </tr>
        <tr>
            <th>Work end time</th>
            <td><?php echo $_SESSION['endtime']; ?></td>
        </tr>
        <tr>
            <th>eferred by</th>
            <td><?php echo $_SESSION['referby']; ?></td>
        </tr>
        <tr>
            <th>Company</th>
            <td>WanderWay</td>
        </tr>

    </table>
</div>

<?php include('../control/logout_control.php');?>
<div class="logout-section">
    <form action="" method="POST">
        <button type="submit" class="logout" name="logout">Logout</button>
    </form>
</div>

<div class="footer">
    <p>© 2025 <?php echo $_SESSION['name']; ?>. All rights reserved.</p>
</div>

</body>
</html>
