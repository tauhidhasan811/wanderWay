<?php
require("../MODEL/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $connection = new mysqli("localhost", "root", "", "WANDERWAY");

    $sql = "DELETE FROM guid WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
    header("Location: showdata.php");
    exit();
}
?>