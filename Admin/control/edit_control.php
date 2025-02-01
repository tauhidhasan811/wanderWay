

<?php
include('../model/edit_model.php');
include('../model/db_get_data.php');

if (isset($_POST['submit']))
{
    $gobj = new GetData(); // Use the correct class name
    $gconobj = $gobj->connection(); // Get the database connection

    if (empty($_POST['email']) || !preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/", $_POST['email'])) 
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
    else if ($_POST['password'] != $_POST['confirm_password']) 
    {
        
        echo "<p>Password and Confirm must be same</p><br>";
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
                $target_file_pp =  $target_dir_pp.$_SESSION['name'].basename($_FILES["profile_picture"]["name"]);
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
        
        $obj = new data_update();
        $conobj = $obj->connection();
        $_SESSION['pp']=$target_file_pp;
        $_SESSION['number']= $_POST['phone_number'];
        $check = $obj->update_admin(
            $conobj,
            $_SESSION['id'],
            $_POST['email'], 
            $_POST['password'], 
            $_POST['phone_number'],
            
            $_POST['working_time_start'],
            $_POST['working_time_end'],
            $target_file_pp );
        $_SESSION['pp']=$target_file_pp;
        $_SESSION['number']= $_POST['phone_number'];
        
    }
    
}

?>