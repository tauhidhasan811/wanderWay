<?php

session_start();
include('../model/login_model.php');
$obj = new loginVerify();
$con = $obj->connection();
if(isset($_POST['login']))
{
    if(empty($_POST['email']))
    {
        echo "<p>Email can not be empty</p>";
    }
    else if(empty($_POST['password']))
    {
        echo "password can not be empty";
    }
    else if(! $obj->get_mail($con, 'admin', $_POST['email']))
    {
        
        echo '<p class = "error error_pos" >Email does not exist</p>';
    }
    else if(!$obj->verify_pass($con, 'admin', $_POST['email'], $_POST['password']))
    {
        
        
        echo '<p class = "error error_pos" >Wrong password</p>';
        session_destroy();
    }
    else
    {
        $result = $obj->verify_pass($con, 'admin', $_POST['email'], $_POST['password']);
        if ($result->num_rows > 0) 
        {
            
            $row = $result->fetch_assoc();
            $_SESSION['id']= $row['ad_id'];
            $_SESSION['email']= $row['ad_id'];
            header('Location: ../view/admin_profile.php');
        } 
    }
}
else if(isset($_POST['singup']))
{
    header('Location: ../view/admin_registration_page.php');
}


