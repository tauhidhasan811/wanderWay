<?php

require("../MODEL/db.php");

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
   // $PROFILE_PICTURE = $_FILES['profile_picture']['name'] ? $_FILES['profile_picture']['name'] : '';

    $errors = [];

    // Validate Full Name
    if (empty($NAME) || !preg_match("/^[a-zA-Z ]+$/", $NAME)) {
        $errors[] = "Invalid name. Name should only contain letters and spaces.";
    }

    // Validate Email
    if (empty($MAIL) || !filter_var($MAIL, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate Phone
    if (empty($PHONE) || !ctype_digit($PHONE) || strlen($PHONE) != 11) {
        $errors[] = "Invalid phone number. Must be 11 digits.";
    }

    // Validate Password
    if (empty($PASS) || !preg_match("/[@$&]/", $PASS)) {
        $errors[] = "Password must contain at least one special character (@, $, &).";
    }

    // Confirm Password Validation
    if ($PASS !== $CPASS) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    // Validate Gender
    if (empty($GEN) || !in_array($GEN, ['male', 'female'])) {
        $errors[] = "Please select a valid gender.";
    }

    // Validate Date of Birth
    if (empty($DOB)) {
        $errors[] = "Date of Birth is required.";
    }

    // Validate Address
    if (empty($ADD)) {
        $errors[] = "Address is required.";
    }

    // Validate Experience
    if (empty($EXP) || !ctype_digit($EXP)) {
        $errors[] = "Experience must be a numeric value.";
    }

    // Validate Languages
    if (empty($LAN)) {
        $errors[] = "Languages spoken is required.";
    }

    // Validate Locations
    if (empty($LOC)) {
        $errors[] = "Preferred tour locations are required.";
    }

    // Validate Driving Experience
    if (empty($DRIVE) || !in_array($DRIVE, ['yes', 'no'])) {
        $errors[] = "Please specify your driving experience.";
    }

    // Validate Passport Number
    if (empty($PASSPORT)) {
        $errors[] = "Passport number is required.";
    }

    // Validate Nationality
    if (empty($NATIONALITY)) {
        $errors[] = "Nationality is required.";
    }

    // Validate Availability
    if (empty($AVAIL) || !in_array($AVAIL, ['full_time', 'part_time', 'weekends_only'])) {
        $errors[] = "Please select a valid availability option.";
    }

   

    if (empty($errors)) {
        $guid = new guid();
        $guid->insertData("guid", $NAME, $MAIL, $PHONE, $PASS, $CPASS, $GEN, $DOB, $EXP, $LAN, $LOC, $DRIVE, $PASSPORT, $NATIONALITY, $AVAIL);
        echo "Registration successful!";
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

?>
