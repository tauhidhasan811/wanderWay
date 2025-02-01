<?php

if(isset($_POST['logout']))
{
    session_unset();
    $check = session_destroy();
    if($check)
    {
        echo 'logout sucessfully';
        header('location: ../view/login.php');
    }
    else
    {
        echo 'faild to logout';
    }

}