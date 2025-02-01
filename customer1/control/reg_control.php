<?php

include('../model/db_customer.php');
echo $_POST['username'];
if(ctype_alpha('username'))
{
    echo "Successful";
}


else if (isset($_POST['password'])) { 
    $password = $_POST['password'];
    if (preg_match('/[@#$&]/', $password)) {
        echo "Successful";
    } 
    else{

        echo "Error: Password must contain at least one special character (@, #, $, &).";
    }
} 

else
{
    
}

$obj = new data_insert();
$conobj = $obj->connection();
$obj->insert_customer(
    $conobj,
    $_POST['username'],
    $_POST['address'], 
    $_POST['email'],
    $_POST['phone'],
    $_POST['password'],
    $_POST['gender'],
    $_POST['nidnum'],
    $_POST['nationality'],
    $_POST['econtactnumber'],
    $_POST['image']
);