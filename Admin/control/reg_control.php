

<?php
if (isset($_POST['submit']))
{
    

    if (ctype_alnum($_POST['username']) && !preg_match("/^[a-zA-Z]*[A-Z][a-zA-Z]*$/", $_POST['username']))
    {
        echo "<p>Username must only contain alphabetic characters and at least one uppercase letter.</p><br>";
    } 

    else if (empty($_POST['email']) || !preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.xyz$/", $_POST['email'])) 
    {
        echo "<p>user name: ".$_POST['username']."<br></p>";
        echo "<p>Enter a valid Email with the .xyz domain</p><br>";
    }
    else if (empty($_POST['password']) || !preg_match("/[0-9]/", $_POST['password']))
    {
        echo "<p>user name: ".$_POST['username']."<br></p>";
        echo "<p>mail     : ".$_POST['email']."<br></p>";
        echo "<p>Password is required and must contain at least one numeric character</p><br>";
    }
    else
    {
        echo "<p>user name: ".$_POST['username']."<br></p>";
        echo "<p>mail     : ".$_POST['email']."<br></p>";
        echo "<p>password : ".$_POST['password']."<br></p>";
        $admin_data = array('User name' => $_POST['username'],
                            'Email: ' => $_POST['email'], 
                            'Psaaword: '=> $_POST['password'],
                            'Phone Number: ' => $_POST['phone_number'],
                            'Role: ' => $_POST['role'],
                            'Gender: ' => $_POST['gender'],
                            'National ID Number: ' => $_POST['national_id'],
                            'Date of Birth: ' => $_POST['date_of_birth'],
                            'Jonning Date: ' => $_POST['joining_date'],
                            'National ID Number: ' => $_POST['national_id'],
                            'Working Time Strat: ' => $_POST['working_time_start'],
                            'Working Time End: ' => $_POST['working_time_end'],
                            'Referance by: ' => $_POST['referenced_by'],
                            'Recive Notification: ' => $_POST['notifications'],
                            'Preferred Language: ' => $_POST['language']
                            
                    );
        $json_encodes = json_encode($admin_data, JSON_PRETTY_PRINT);
        if(file_put_contents('../Data/data.json', $json_encodes))
        {
            echo 'Data save successfully';
        }
        else
        {
            echo "Failed to save <br.";
        }
    }
    
}