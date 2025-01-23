<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Guide Registration</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <h2>Tour Guide Registration</h2>
    <form action="../CONTROL/ragcontrol1.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Guide Information</legend>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" ></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" ></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="tel" name="phone" ></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" ></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" ></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <select name="gender" >
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" ></td>
                </tr>
                <tr>
                    <td>Experience (Years):</td>
                    <td><input type="number" name="experience" ></td>
                </tr>
                <tr>
                    <td>Languages Spoken:</td>
                    <td><input type="text" name="languages" placeholder="e.g., English, Bangla, Other" ></td>
                </tr>
                <tr>
                    <td>Preferred Tour Locations:</td>
                    <td><input type="text" name="locations" placeholder="e.g., Cox's Bazar, Rajshahi" ></td>
                </tr>
                <tr>
                    <td>Driving Experience:</td>
                    <td>
                        <input type="radio" id="yes" name="driving_experience" value="yes" >
                        <label for="yes">Yes</label>
                        <input type="radio" id="no" name="driving_experience" value="no" >
                        <label for="no">No</label>
                    </td>
                </tr>
                <tr>
                    <td>Passport Number:</td>
                    <td><input type="text" name="passport_number" ></td>
                </tr>
                <tr>
                    <td>Nationality:</td>
                    <td><input type="text" name="nationality" ></td>
                </tr>
                <tr>
                    <td>Availability:</td>
                    <td>
                        <select name="availability" >
                            <option value="">Select Availability</option>
                            <option value="full_time">Full-Time</option>
                            <option value="part_time">Part-Time</option>
                            <option value="weekends_only">Weekends Only</option>
                        </select>
                    </td>
                </tr>
               
            </table>
        </fieldset>
        
        <div>
            <button type="submit" name="submit1">Submit</button>
            <button type="reset">Clear Form</button>
        </div>
    </form>
    <form action="showdata.php" method="get">
        <button type="submit">Show All Data</button>
    </form>
</body>
</html>
