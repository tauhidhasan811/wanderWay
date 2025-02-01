<?php
session_start(); // Start the session

include('../model/update_model.php');

// Ensure the session variable 'email' is set
if (isset($_SESSION['email'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize user inputs
        $name = htmlspecialchars(trim($_POST['name']));
        $address = htmlspecialchars(trim($_POST['address']));
        $password = htmlspecialchars(trim($_POST['password']));
        $number = htmlspecialchars(trim($_POST['number']));
        $gender = htmlspecialchars(trim($_POST['gender']));
        $nationality = htmlspecialchars(trim($_POST['nationality']));
        $email = $_SESSION['email']; // Get email from the session

        // Instantiate the model and call the update function
        $obj = new data_update();
        $conobj = $obj->connection();
        $obj->update_customer($conobj, $name, $address, $number, $password, $gender, $nationality, $email);
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "No email found in session. Please log in first.";
}
?>
