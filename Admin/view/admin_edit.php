<?php session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/edit_profile.css">
</head>
<body>
    <form action= '' method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <h2>Update your information</h2>
        <fieldset>
            <legend>Admin Information</legend>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" id  = 'email' name="email" class = 'input' value= <?php echo $_SESSION['email']; ?>></td>
                    
                </tr>
                <tr>
                    <td></td><td id='emailError' class= 'error'></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id ='password' name="password" class = 'input'></td>
                </tr>
                <tr>
                    <td></td><td id='passwordError' class= 'error'></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" id = 'confirm_password' name="confirm_password" class = 'input'></td>
                    
                </tr>
                <tr>
                <td></td><td id='conpasswordError' class= 'error'></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" id= 'phone_number' name="phone_number" class = 'input' value= <?php echo $_SESSION['number']; ?> ></td>
                </tr>
                <tr>
                    <td>Working Time Start:</td>
                    <td><input type="time" name="working_time_start" class = 'input_box' value= <?php echo $_SESSION['starttime']; ?>></td>
                </tr>
                <tr>
                    <td>Working Time End:</td>
                    <td><input type="time" name="working_time_end" class = 'input_box' value= <?php echo $_SESSION['endtime']; ?>></td>
                </tr>
           
                <tr>
                    <td>Upload Profile Picture:</td>
                    <td>
                        <input type="file" onchange="profile_Change()" id="profile_picture" name="profile_picture" value = '<?php echo $_SESSION['pp']; ?>'>
                        <br><img id = 'preview'src="<?php echo $_SESSION['pp']; ?>" alt="Current Profile Picture" width="100">
                    </td>
                </tr>

                <tr>
                <td></td><td id='PPError' class= 'error'></td>
                </tr>
            </table>
        </fieldset>
        
        <button type="submit" name = "submit" class = 'submit'>Update</button>
        <button type="button" class = 'cancle' onclick="page_change()">Cancel</button>
        
    </form>
    <script src="../js/edit.js"></script>
</body>
</html>

<?php
include('../control/edit_control.php');
?>



