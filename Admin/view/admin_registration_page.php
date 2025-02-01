<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form action= '' method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <h2>Welcome To, Admin Registration page</h2>
        <fieldset>
            <legend>Admin Information</legend>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input id= 'name' type="text" name="username" class = 'input' > <br></td>
                    
                </tr>
                <tr>
                    <td></td><td id='usenameError' class= 'error'></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" id  = 'email' name="email" class = 'input'></td>
                    
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
                    <td><input type="text" id= 'phone_number' name="phone_number" class = 'input' ></td>
                </tr>
                <tr>
                    <td>Role:</td>
                    <td>
                        <select name="role" class = 'input_box'>
                            <option value="select">Select Role</option>
                            <option value="super_admin" name = "super_admin" class = 'input_box'>Super Admin</option>
                            <option value="moderator" name = " moderator" class = 'input_box'>Moderator</option>
                            <option value="content_manager" name= "content_manager" class = 'input_box'>Content Manager</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" id="male" name="gender" value="male" >
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female" >Female</label>
                    </td>
                </tr>
                <tr>
                    <td>National ID Number:</td>
                    <td><input type="text" name="national_id" class = 'input'></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="date_of_birth" class = 'input_box'></td>
                </tr>
                <tr>
                    <td>Joining Date:</td>
                    <td><input type="date" name="joining_date" class = 'input_box'></td>
                </tr>
                <tr>
                    <td>Working Time Start:</td>
                    <td><input type="time" name="working_time_start" class = 'input_box'></td>
                </tr>
                <tr>
                    <td>Working Time End:</td>
                    <td><input type="time" name="working_time_end" class = 'input_box'></td>
                </tr>
                <tr>
                    <td>Referenced By:</td>
                    <td><input type="text" name="referenced_by" class = 'input' ></td>
                </tr>
                <tr>
                    <td>Drop Test Report:</td>
                    <td><input type="file" id= 'drop_test' name="drop_test" id="drop_test" class = ''> </td>
                    
                </tr>
                <tr>
                <td></td><td id='fileError' class= 'error'></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Account Preferences</legend>
            <table>
                <tr>
                    <td>Receive Notifications:</td>
                    <td>
                        <input type="checkbox" id="email_notifications" name="notifications[]" value="email"  >
                        <label >Email</label>
                        <input type="checkbox" id="sms_notifications" name="notifications[]" value="sms" >
                        <label >SMS</label>
                    </td>
                </tr>
                <tr>
                    <td>Preferred Language:</td>
                    <td>
                        <select name="language" class = 'input_box'>
                            <option value="select" class = 'input_box'>Select Language</option>
                            <option value="english" class = 'input_box'>English</option>
                            <option value="bangla" class = 'input_box'>Bangla</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Upload Profile Picture:</td>
                    <td><input type="file" id='profile_picture' name="profile_picture"></td>
                   
                </tr>
                <tr>
                <td></td><td id='PPError' class= 'error'></td>
                </tr>
                <tr>
                <td></td><td class= 'phperror'> <?php
                include('../control/reg_control.php');
                    ?></td>
               
                </tr>
            </table>
        </fieldset>
        
        <button type="submit" name = "submit" class = 'submit'>Register</button>
        <button type="reset" class = 'reset'>Clear Form</button>
        <button type="button" class = 'login' onclick = "page_change()">Login</button>
        
    </form>
    <script src="../js/admin_reg.js"></script>
</body>
</html>




