<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" type="text/css" href="./login_control.css"> 
</head>
<body>

<?php
include('../model/login_model.php');

class GuideManager {
    private $connectionObject;

    function __construct() {
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "wanderway";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    function getAllData() {
       

        $sql = "SELECT * FROM tourguide";
        $result = $this->connectionObject->query($sql);

        if ($result->num_rows > 0) {
            echo "<a href='../VIEW/package.php'>Package</a>
                  <a href='../CONTROL/show_data.php'>Show package</a>";  
           
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['tg_id']}</td>
                        <td>{$row['tg_name']}</td>
                        <td>{$row['tg_email']}</td>
                        <td>{$row['tg_number']}</td>
                        <td>
                            <a href='../update.php?id={$row['tg_id']}'>Update</a> | 
                            <a href='../delete.php?id={$row['tg_id']}'>Delete</a>
                        </td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "No records found.";
        }

        echo "</body>
        </html>";
    }

    function __destruct() {
        $this->connectionObject->close();
    }
}

$manager = new GuideManager();
$manager->getAllData();
?>
