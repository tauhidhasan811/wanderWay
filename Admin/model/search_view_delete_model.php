<?php
class DeleteData
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

    public function delete($conobj, $table, $id)
    {
        // Prepare the SQL query with a placeholder for the ad_id
        $stmt = $conobj->prepare("DELETE FROM $table WHERE ad_id = ?");
        
        if (!$stmt) {
            die("Query preparation failed: " . $conobj->error);
        }

        // Bind the id parameter to the prepared statement
        $stmt->bind_param("i", $id);  // "i" means integer
        
        // Execute the query and check if successful
        if ($stmt->execute()) {
            return true;  // Record deleted successfully
        } else {
            return false; // Error executing the query
        }

        $stmt->close();  // Close the prepared statement
    }
}
?>
