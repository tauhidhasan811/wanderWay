<?php
class data_insert
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

    function insert_customer($conobj,$name, $address, $mail, $number, $password, $gender, $nationald, $nationality,$emnumber,$profnaid )
    {
        if (!$conobj->connect_error) 
        {
            $insert = "INSERT INTO customer (
               cu_name,cu_address,cu_email,cu_number,cu_password,cu_gender,cu_nationald,cu_nationality,cu_em_number,cu_prof_naID) 
               VALUES ('$name', '$address', '$mail', '$number', '$password', '$gender', '$nationald', '$nationality','$emnumber','$profnaid' )";
        
            if ($conobj->query($insert)) {
                echo "Account created successfully.";
            } else {
                echo "Failed to insert. Error: " . $conobj->error;
            }
        } 
        else 
        {
            echo $conobj->error;
        }
    }
    
}
?>