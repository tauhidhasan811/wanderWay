<?php
include('../model/package_model.php');

if (isset($_POST['update_package'])) {
    $id = $_POST['pk_id'];
    $title = $_POST['pk_title'];
    $desc = $_POST['pk_des'];
    $location = $_POST['pk_location'];
    $duration = $_POST['pk_duration'];
    $validation = $_POST['pk_validation'];

    if (updatePackage($id, $title, $desc, $location, $duration, $validation)) {
        header("Location: ../view/package.php?success=Package Updated");
    } else {
        echo "Error updating package.";
    }
}
?>
