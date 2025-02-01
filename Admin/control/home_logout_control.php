<?php

if(isset($_POST['logout']))
{
    session_unset();
    $check = session_destroy();
    if($check)
    {
        header('location: Home.php');
    }
    else
    {
        echo 'faild to logout';
    }

}