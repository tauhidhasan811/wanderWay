<?php
session_start();
include('../model/login_model.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "Error: Email and password are required.";
        exit();
    }

    // Instantiate the model
    $model = new LoginModel();

    // Authenticate user
    $user = $model->authenticate($email, $password);

    if ($user) {
        // Successful login
        echo "Login successful. Welcome, " . htmlspecialchars($user['cu_name']) . "!";
        $_SESSION['email']=$email;
        // Redirect to a dashboard or another page (uncomment the line below for redirection)
         header('Location: ../view/profile.php');
    } else {
        // Failed login
        echo "Error: Invalid email or password.";
    }

    // Close database connection
    $model->closeConnection();
} else {
    echo "Invalid request method.";
}
?>

