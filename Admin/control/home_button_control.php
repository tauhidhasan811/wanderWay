<?php
session_start();

if (!empty($_SESSION['id'])) {
    echo '<a href="Admin/view/admin_profile.php" class="a">' . htmlspecialchars($_SESSION['name']) . '</a>';
}
else {
    echo '<select name="create_account" class="a drop_down_create" onclick="navigateRegistration(this.value)">
        <option value="select" class="input_box">Create Account</option>
        <option value="../view/login.php" class="input_box">Customer</option>
        <option value="../view/login.php" class="input_box">Tour Guide</option>
        <option value="Admin/view/admin_registration_page.php" class="input_box">Admin</option>
    </select>';
    echo '<select name="login"class="a drop_down_login" onchange="navigateLogin(this.value)">
        <option value="select" class="input_box">Log in</option>
        <option value="../view/login.php" class="input_box">Customer</option>
        <option value="../view/login.php" class="input_box">Tour Guide</option>
        <option value="Admin/view/login.php" class="input_box">Admin</option>
    </select>';
    
}

if (!empty($_SESSION['id'])) {
    echo '<form method="POST">';
    echo '<button type="submit" name="logout" class="logout">Logout</button>';
    echo '</form>';
}

if (isset($_POST['logout'])) 
{
    include('Admin/control/home_logout_control.php');
}
?>


