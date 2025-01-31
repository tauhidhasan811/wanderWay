<?php
class data_insert
{
    function connection()
    {
        $DBHostname = "localhost";
        $DBUsername = "root";
        $DBPassword = "";
        $DBname = "wanderway";
        $connectionObject = new mysqli($DBHostname, $DBUsername, $DBPassword, $DBname);
        
        if ($connectionObject->connect_error) {
            echo "Error connecting to DB: " . $connectionObject->error;
        }
        return $connectionObject;
    }

    function insert_package($conobj, $title, $location, $duration, $validation, $des)
    {
        if (!$conobj->connect_error) 
        {
            $insert = "INSERT INTO package (pk_title, pk_location, pk_duration, pk_validation, pk_des)
            
              VALUES ( '$title', '$location', $duration, '$validation', '$des' )";
           
               
        
            if ($conobj->query($insert))
            {
                return true;
            }
            else
            {
                echo "Failed to insert. Error: " . $conobj->error;
                return false;
            }
        } 
        else 
        {
            echo $conobj->error;
            return false;
        }
    }
    
}
?>
