

<?php


if (isset($_POST['submit']))
{
    include('../model/db_admin.php');
    include('../model/db_get_data.php');
    $gobj = new GetData(); // Use the correct class name
    $gconobj = $gobj->connection(); // Get the database connection

    if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['username'])) {
        echo "<p>Username must only contain alphabetic characters and spaces.</p><br>";
    }
    

    else if (empty($_POST['email']) || !preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/", $_POST['email'])) 
    {
        echo "<p>user name: ".$_POST['username']."<br></p>";
        echo "<p>Enter a valid Email with the .xyz domain</p><br>";
    }
    
    
    else if($gobj -> get_mail($gconobj, 'admin', $_POST['email']))
    {
        echo " This email already used";
    }
    else if (empty($_POST['password']) || !preg_match("/[0-9]/", $_POST['password']))
    {
        echo "<p>user name: ".$_POST['username']."<br></p>";
        echo "<p>mail     : ".$_POST['email']."<br></p>";
        echo "<p>Password is required and must contain at least one numeric character</p><br>";
    }
    else if ($_POST['password'] != $_POST['confirm_password']) 
    {
        
        echo "<p>Password and Confirm must be same</p><br>";
    }
    else if (empty(basename($_FILES['drop_test']['name'])))
    {
        // Corrected the $_FILES usage
        echo "You must upload Drop test report";
    }

    else
    {
        if(!empty(basename($_FILES['profile_picture']['name'])))
        {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif']; // Add WEBP and AVI to allowed extensions
            $file_extension = strtolower(pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION));

            if (in_array($file_extension, $allowed_extensions)) 
            {
                $target_dir_pp = '../file/images/';
                $target_file_pp =  $target_dir_pp.$_POST['username'].basename($_FILES["profile_picture"]["name"]);
                if(move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file_pp)) 
                {
                    //echo "The file ". basename($_FILES["profile_picture"]["name"])." has been uploaded.";
                }
                else
                {
                    $target_file_pp= '';
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            else
            {
                $target_file_pp= " ";
                //echo "Drop test type must be pdf".'<br>';
            }
            
        }
        else
        {
            $target_file_pp= " ";
            
        }
        
        $target_dir = '../file/drop_test_file/';
        

        $target_file =  $target_dir.$_POST['username'].basename($_FILES["drop_test"]["name"]);
        

       
        if(move_uploaded_file($_FILES["drop_test"]["tmp_name"], $target_file)) 
        {
        }
        else
        {
            echo "Sorry, there was an error uploading your file.";
        }
        if(!empty($_POST['notifications']))
        {
            $notification = implode(", ", $_POST['notifications']);
        }
        else
        {
            $notification= '';
        }
        
        $obj = new data_insert();
        $conobj = $obj->connection();
        if($obj->insert_admin(
            $conobj,
            $_POST['username'],
            $_POST['email'], 
            $_POST['password'], 
            $_POST['phone_number'],
            $_POST['role'],
            $_POST['gender'],
            $_POST['national_id'],
            $_POST['date_of_birth'],
            $_POST['joining_date'], 
            $_POST['working_time_start'],
            $_POST['working_time_end'],
            $_POST['referenced_by'],
            $target_file,
            $notification,
            $_POST['language'],
            $target_file_pp 
        ))
        {
            echo "ACCOUNT CREATE SUCCESSFULLY";
        }
       
        
          /*$admin_data = array('User name' => $_POST['username'],
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
                            'Recive Notification: ' => $notification,
                            'Preferred Language: ' => $_POST['language']
                            
                    );
        $json_encodes = json_encode($admin_data, JSON_PRETTY_PRINT);
        if(file_put_contents('../data.json', $json_encodes))
        {
           // echo 'Data save successfully';
        }
        else
        {
            echo "Failed to save <br.";
        }*/
    }
    
}
else if(isset($_POST['login']))
{
    header( 'location: login.php');
}
?>