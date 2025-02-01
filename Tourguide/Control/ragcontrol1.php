<?php

require("./MODEL/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $NAME = $_POST['full_name'] ? $_POST['full_name'] : '';
    $MAIL = $_POST['email'] ? $_POST['email'] : '';
    $PHONE = $_POST['phone'] ? $_POST['phone'] : '';
    $PASS = $_POST['password'] ? $_POST['password'] : '';
    $CPASS = $_POST['confirm_password'] ? $_POST['confirm_password'] : '';
    $GEN = $_POST['gender'] ? $_POST['gender'] : '';
    $DOB = $_POST['dob'] ? $_POST['dob'] : '';
    $ADD = $_POST['address'] ? $_POST['address'] : '';
    $EXP = $_POST['experience'] ? $_POST['experience'] : '';
    $LAN = $_POST['languages'] ? $_POST['languages'] : '';
    $LOC = $_POST['locations'] ? $_POST['locations'] : '';
    $DRIVE = $_POST['driving_experience'] ? $_POST['driving_experience'] : '';
    $PASSPORT = $_POST['passport_number'] ? $_POST['passport_number'] : '';
    $NATIONALITY = $_POST['nationality'] ? $_POST['nationality'] : '';
    $AVAIL = $_POST['availability'] ? $_POST['availability'] : '';
   

    $errors = [];

    
    if (empty($NAME) || !preg_match("/^[a-zA-Z ]+$/", $NAME)) {
        $errors[] = "Invalid name. Name should only contain letters and spaces.";
    }

  
    if (empty($MAIL) || !filter_var($MAIL, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    
    if (empty($PHONE) || !ctype_digit($PHONE) || strlen($PHONE) != 11) {
        $errors[] = "Invalid phone number. Must be 11 digits.";
    }

    
    if (empty($PASS) || !preg_match("/[@$&]/", $PASS)) {
        $errors[] = "Password must contain at least one special character (@, $, &).";
    }

    
    if ($PASS !== $CPASS) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    
    if (empty($GEN) || !in_array($GEN, ['male', 'female'])) {
        $errors[] = "Please select a valid gender.";
    }

    
    if (empty($DOB)) {
        $errors[] = "Date of Birth is required.";
    }

    
    if (empty($ADD)) {
        $errors[] = "Address is required.";
    }

    
    if (empty($EXP) || !ctype_digit($EXP)) {
        $errors[] = "Experience must be a numeric value.";
    }

    
    if (empty($LAN)) {
        $errors[] = "Languages spoken is required.";
    }

    
    if (empty($LOC)) {
        $errors[] = "Preferred tour locations are required.";
    }

   
    if (empty($DRIVE) || !in_array($DRIVE, ['yes', 'no'])) {
        $errors[] = "Please specify your driving experience.";
    }

    
    if (empty($PASSPORT)) {
        $errors[] = "Passport number is required.";
    }

   
    if (empty($NATIONALITY)) {
        $errors[] = "Nationality is required.";
    }

   
    if (empty($AVAIL) || !in_array($AVAIL, ['full_time', 'part_time', 'weekends_only'])) {
        $errors[] = "Please select a valid availability option.";
    }
    $obj = new guid();
    $conobj = $obj->connection();
    $obj->insert_guid(
        $conobj,
        $_POST['full_name'],
        $_POST['email'] ,
        $_POST['phone'],
        $_POST['password'],
        $_POST['gender'] ,
        $_POST['dob'] ,
        $_POST['address'] ,
        $_POST['experience'] ,
        $_POST['languages'] ,
        $_POST['locations'] ,
        $_POST['driving_experience'] ,
        $_POST['passport_number'] ,
        $_POST['nationality'] ,
        $_POST['availability'] ,
    );

    
}

?>
