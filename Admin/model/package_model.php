<?php
class DataInsert
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

    function insert_package($conobj, $title, $location, $duration, $validation, $des, $tgID)
    {
        if (!$conobj->connect_error) {
            $query = "INSERT INTO package (pk_title, pk_location, pk_duration, pk_validation, pk_des, tg_id) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conobj->prepare($query);

            if ($stmt) {
                $stmt->bind_param("ssissi", $title, $location, $duration, $validation, $des, $tgID);

                if ($stmt->execute()) {
                    $stmt->close();
                    return true;
                } else {
                    echo "Failed to insert. Error: " . $stmt->error;
                    $stmt->close();
                    return false;
                }
            } else {
                echo "Failed to prepare statement. Error: " . $conobj->error;
                return false;
            }
        } else {
            echo "Database connection error: " . $conobj->error;
            return false;
        }
    }
}


?>
