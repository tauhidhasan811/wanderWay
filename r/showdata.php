<?php
require("../MODEL/db.php");

class GuideManager {
    private $connectionObject;

    function __construct() {
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "WANDERWAY";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    function getAllData() {
        $sql = "SELECT * FROM guid";
        $result = $this->connectionObject->query($sql);

        if ($result->num_rows > 0) {
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
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['mail']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Update</a> | 
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No records found.";
        }
    }

    function __destruct() {
        $this->connectionObject->close();
    }
}

$manager = new GuideManager();
$manager->getAllData();
?>
