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

 

    public function get_alldata($conobj, $table)
    {
        $stmt = $conobj->prepare("SELECT * FROM $table ORDER BY(pk_validation) DESC");

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
        $stmt = $conobj->prepare("SELECT * FROM $table ");

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