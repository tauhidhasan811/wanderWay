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

    function insert_admin($conobj, $name, $mail, $password, $number, $role, $gender, $nationald, $dob, $joinDate, $startT, $endTime, $sererBy, $drop_test, $notification, $lang, $pp)
    {
        if (!$conobj->connect_error) 
        {
            $insert = "INSERT INTO Admin (
                ad_name, ad_email, ad_password, ad_number, ad_role, ad_gender, ad_nationald,
                ad_DOB, ad_joinDate, ad_startT, ad_endTime, ad_referBy, ad_dropTest,
                ad_notification, ad_lang, ad_pp
            ) VALUES (
                '$name', '$mail', '$password', '$number', '$role', '$gender', '$nationald', 
                '$dob', '$joinDate', '$startT', '$endTime', '$sererBy', '$drop_test', 
                '$notification', '$lang', '$pp'
            )";
        
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
