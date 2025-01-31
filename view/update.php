<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Form</title>
    <link rel="stylesheet" href="../css/update_design.css">
</head>
<body>
    <div class="container">
    <div class="profile">Edit Profile</div>
    <form action="../control/update_control.php" method="post">
       <div class="container2">
        <div class="inputbox">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        </div>

        <div class="inputbox">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        </div>

        <div class="inputbox">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        </div>
        
        <div class="inputbox">
        <label for="number">Phone Number:</label>
        <input type="text" id="number" name="number" required>
        </div>

        <div class="inputbox">
        <label>Gender:</label>
        <div class="gender-options">
        <input type="radio" id="male" name="gender" value="male" required>Male
        <input type="radio" id="female" name="gender" value="female" required>female
        </div>
        </div>

        <div class="inputbox">
        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" required>
        </div>
        <input class="lastinput" type="submit" value="EDIT">
    </div>
    </form>
    </div>
</body>
</html>

