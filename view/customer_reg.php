<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Registration</title>
    <link rel="stylesheet" href="../css/reg_design.css">
</head>
<body>
    <h2>Customer Registration</h2>
    <div class="container">
    <form action="..\control\reg_control.php" method="POST">
   
        <fieldset>
            <legend>Customer Information</legend>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><input type="text" name="address"></td>
                </tr>
                
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email"></td>
                    </tr>
                
                <tr>
                    <td>Phone :</td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password"></td>
                </tr>
                
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" id="male" name="gender" value="male">Male
                        <input type="radio" id="female" name="gender" value="female">Female
                    </td>
                </tr>

                <tr>
                    <td>Nid Number:</td>
                    <td><input type="nid_number" name="nidnum" ></td>
                </tr>     
                
                <tr>
                    <td>Nationality :</td>
                    <td> <input type="text" name="nationality" ></td>
                </tr>
                <tr>
                    <td>Emergency Contact number:</td>
                    <td><input type="text" name="econtactnumber"></td>
                </tr>

                <tr>
                    <td>Upload ID Proof :</td>
                    
                    <td><input type="file" name="image" value="Choose File"></td>
                </tr> 
                
                </table>
            </fieldset>

        <button type="submit">Register</button>
        <button type="reset">Clear Form</button>
    </form>
</div>
<script type="module" src="../control/validate_form.js"></script>
</body>
</html>
