<?php
class guid
{
    private $connectionObject;

     function __construct()
    {
        
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "WANDERWAY";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    function insertData($table,$NAME, $MAIL, $PHONE, $PASS, $CPASS, $GEN, $DOB, $EXP, $LAN, $LOC, $DRIVE, $PASSPORT, $NATIONALITY, $AVAIL)
    {
        // SQL query to insert data into the database
        $sql = "INSERT INTO $table (name, mail, phone, pass, cpass, gen, dob, address, exp, lan, loc, drive, passport, avail) 
                VALUES ('$NAME', '$MAIL', '$PHONE', '$PASS', '$CPASS', '$GEN', '$DOB', '$EXP', '$LAN', '$LOC', '$DRIVE', '$PASSPORT', '$NATIONALITY', '$AVAIL')";

        // Execute the query and handle success or error
        if ($this->connectionObject->query($sql) === TRUE) {
            echo "regestration success";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connectionObject->error;
        }
    }
    // Close the connection when done
     function __destruct()
    {
        $this->connectionObject->close();
    }
}
?>
