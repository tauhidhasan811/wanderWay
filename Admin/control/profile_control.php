<?php

include('../model/profile_model.php');
$gobj = new GetData();
$gconobj = $gobj->connection();
if(isset($_SESSION))
{
$data = $gobj->get_profiledata($gconobj, 'admin', $_SESSION['id']);
if ($data->num_rows > 0)
{
    $row = $data->fetch_assoc();
    $_SESSION['id']= $row['ad_id'];
    $_SESSION['name']= $row['ad_name'];
    $_SESSION['email']= $row['ad_email'];
    $_SESSION['number']= $row['ad_number'];
    $_SESSION['role']= $row['ad_role'];
    $_SESSION['gender']= $row['ad_gender'];
    $_SESSION['dob']= $row['ad_DOB'];
    $_SESSION['nid']= $row['ad_nationald'];
    $_SESSION['joindate']= $row['ad_joinDate'];
    $_SESSION['starttime']= $row['ad_startT'];
    $_SESSION['endtime']= $row['ad_endTime'];
    $_SESSION['referby']= $row['ad_referBy'];
    $_SESSION['pp']= $row['ad_pp'];
} 
else 
{
    echo 'Faild to get data';
}


if(isset($_POST['edit']))
{
    header('location: ../view/admin_edit.php');
}
else if(isset($_POST['home']))
{
    header('location: ../../Home.php');
}
else if(isset($_POST['delete']))
{
    $gobj->deleteAccount($gconobj, 'admin', $_SESSION['id']);
    session_unset();
    session_destroy();
    header('location: admin_registration_page.php');
    exit(); 
}

}

?>