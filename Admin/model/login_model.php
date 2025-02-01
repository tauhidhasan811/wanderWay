<?php

class loginVerify
{
    function connection()
    {
        $DBHostname = "localhost";
        $DBUsername = "root";
        $DBPassword = "";
        $DBname = "wanderWay";
        $connectionObject = new mysqli($DBHostname, $DBUsername, $DBPassword, $DBname);
        
        if ($connectionObject->connect_error) {
            echo "Error connecting to DB: " . $connectionObject->error;
        }
        return $connectionObject;
    }

    function get_mail($conobj, $table, $email)
    {
        // Prepared statement for security
        $stmt = $conobj->prepare("SELECT * FROM $table WHERE ad_email = ?");
        $stmt->bind_param("s", $email); // Bind email as a string
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return true; // Email exists
        } else {
            return false; // Email does not exist
        }
    }
    public function verify_pass($conobj, $table,$mail,$pass)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table WHERE ad_email = '$mail' AND ad_password = '$pass'");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) 
        {
            return $result;
        } 
        else 
        {
            return false; 
        }
    }
}
