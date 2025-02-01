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

  

    public function get_alldataByID($conobj, $table, $email)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table WHERE cu_email = '$email'");

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
    public function delete($conobj, $table, $email)
    {
        $stmt = $conobj->prepare("DELETE FROM $table WHERE cu_email = '$email'");

        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }
        $stmt->execute();
    }

}


?>