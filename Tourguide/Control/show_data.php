<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" type="text/css" href="showdata.css"> 
</head>
<body>

<?php
class DataFetch
{
    function connection()
    {
        $DBHostname = "localhost";
        $DBUsername = "root";
        $DBPassword = "";
        $DBname = "wanderway";
        $connectionObject = new mysqli($DBHostname, $DBUsername, $DBPassword, $DBname);
        
        if ($connectionObject->connect_error) {
            die("Error connecting to DB: " . $connectionObject->error);
        }
        return $connectionObject;
    }

    function fetch_packages($conobj)
    {
        $query = "SELECT * FROM package";
        $result = $conobj->query($query);

        if ($result->num_rows > 0) {
           
            echo "<table border='1'>
                    <tr>
                        <th>Package ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Validation</th>
                       
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['pk_id'] . "</td>
                        <td>" . $row['pk_title'] . "</td>
                         <td>" . $row['pk_des'] . "</td>
                        <td>" . $row['pk_location'] . "</td>
                        <td>" . $row['pk_duration'] . "</td>
                        <td>" . $row['pk_validation'] . "</td>
                       
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No records found.</p>";
        }
    }
}


$fetchObj = new DataFetch();
$connection = $fetchObj->connection();
$fetchObj->fetch_packages($connection);
$connection->close();
?>
