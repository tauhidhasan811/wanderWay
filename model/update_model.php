<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); }// Start the session only if it's not already active

class data_update
{
    function connection()
    {
        $DBHostname = "localhost";
        $DBUsername = "root";
        $DBPassword = "";
        $DBname = "wanderWay";
        $connectionObject = new mysqli($DBHostname, $DBUsername, $DBPassword, $DBname);
        
        if ($connectionObject->connect_error) {
            die("Error connecting to DB: " . $connectionObject->connect_error);
        }
        return $connectionObject;
    }

    function update_customer($conobj, $name, $address, $number, $password, $gender, $nationality, $email)
    {
        if (!$conobj->connect_error) 
        {
            // Use prepared statements to avoid SQL injection
            $update = $conobj->prepare(
                "UPDATE customer 
                 SET cu_name = ?, cu_address = ?, cu_password = ?, cu_number = ?, cu_gender = ?, cu_nationality = ? 
                 WHERE cu_email = ?"
            );

            if ($update) {
                // Bind parameters to the prepared statement
                $update->bind_param("sssssss", $name, $address, $password, $number, $gender, $nationality, $email);

                // Execute the query
                if ($update->execute()) {
                    echo "Customer details updated successfully.";
                } else {
                    echo "Failed to update. Error: " . $update->error;
                }

                $update->close(); // Close the prepared statement
            } else {
                echo "Failed to prepare the query. Error: " . $conobj->error;
            }
        } else {
            echo "Connection error: " . $conobj->connect_error;
        }
    }
}
?>
