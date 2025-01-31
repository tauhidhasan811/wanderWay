<?php
include('model/login_model.php');  // Correct the path here


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $loginModel = new LoginModel();
    $connection = $loginModel->getConnection();

    // Prepare and execute the delete query
    $stmt = $connection->prepare("DELETE FROM tourguide WHERE tg_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect to the list page after deletion
    header("Location: ./control/login_control.php");
    exit();
} else {
    die("Invalid request.");
}
?>
