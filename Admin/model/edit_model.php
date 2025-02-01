<?php
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
            echo "Error connecting to DB: " . $connectionObject->error;
        }
        return $connectionObject;
    }

    function update_admin($conobj, $id,$mail, $password, $number,  $startT, $endTime, $pp)
    {
        if (!$conobj->connect_error) 
        {
            $update = "UPDATE Admin 
           SET ad_email = '$mail', ad_password = '$password', ad_number = '$number', 
               ad_startT = '$startT', ad_endTime = '$endTime', ad_pp = '$pp'
           WHERE ad_id = '$id'";  

        
            if ($conobj->query($update)) 
            {
                return true;
            } 
            else 
            {
                echo "Failed to update. Error: " . $conobj->error;
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
