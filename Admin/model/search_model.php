<?php
class GetData
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

    public function get_alldata($conobj, $table)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result; // Return the result set
        } else {
            return false; // No data found
        }
    }

    public function get_alldataByID($conobj, $table, $id)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table WHERE ad_id = $id");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result; // Return the result set
        } else {
            return false; // No data found
        }
    }
    public function get_alldataByIDAndName($conobj, $table, $id, $name)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table WHERE ad_id = $id AND ad_name = '$name'");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result; // Return the result set
        } else {
            return false; // No data found
        }
    }
    public function get_alldataByIDAndNameAndLimit($conobj, $table, $id, $name, $limit)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table WHERE ad_id = $id AND ad_name = '$name' LIMIT $limit");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result; // Return the result set
        } else {
            return false; // No data found
        }
    }
    public function get_alldataByLimit($conobj, $table, $limit)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table LIMIT $limit");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result; // Return the result set
        } 
        else {
            return false; // No data found
        }
    }

}


?>