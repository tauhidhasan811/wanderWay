<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <form action="../control/login_control.php" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        
        <button type="submit">Login</button>
    </form>
    
</body>
</html>
