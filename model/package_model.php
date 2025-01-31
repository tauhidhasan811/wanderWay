<?php
include('../config/db_connection.php'); // Ensure this file connects to your database

function getPackages() {
    global $conn; // Assuming $conn is the database connection variable
    $query = "SELECT * FROM package";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getPackageById($id) {
    global $conn;
    $query = "SELECT * FROM package WHERE pk_id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function updatePackage($id, $title, $desc, $location, $duration, $validation) {
    global $conn;
    $query = "UPDATE package SET pk_title='$title', pk_des='$desc', pk_location='$location', pk_duration='$duration', pk_validation='$validation' WHERE pk_id=$id";
    return mysqli_query($conn, $query);
}
?>
