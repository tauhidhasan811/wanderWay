<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="../css/login_design.css">
</head>
<body>
    <form action="../control/login_control.php" method="post">
    <div class="wrapper"> 

    <h1>Login</h1> 
    <div class="input-box">
    <input type="email" placeholder="email" name="email" > 
    </div> 
    <div class="input-box"> 
    <input type="password" placeholder="password" name="password" > 
    <button type="submit" class="btn">Login</button>
    <div class="register_link">
        <p>Don't have an account?<a
        href="customer_reg.php">Ragister</a></p>
    </div> 
    </form>
</body>
</html>

