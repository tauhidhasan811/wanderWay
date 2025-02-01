<?php
class guid
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

    function insert_customer($conobj,$NAME, $MAIL, $PHONE, $PASS, $GEN, $DOB, $ADD , $EXP,  $LAN , $LOC,  $DRIVE , $PASSPORT , $NATIONALITY , $AVAIL  )
    {
        if (!$conobj->connect_error) 
        {
            $insert = "INSERT INTO tourguide (tg_name ,tg_email,tg_number,tg_password,tg_gender,tg_DOB,tg_address,tg_exp,tg_Spoken,tg_preTguid,tg_Dexp,tg_passNum,tg_nationality,tg_avai) 
               VALUES ('$NAME', '$MAIL', '$PHONE', '$PASS', '$GEN', '$DOB', '$ADD' , '$EXP',  '$LAN' , '$LOC',  '$DRIVE' , '$PASSPORT' , '$NATIONALITY' , '$AVAIL'  )";
        
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