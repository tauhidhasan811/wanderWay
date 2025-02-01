<?php
include('model/login_model.php');  // Include the model

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create an instance of LoginModel
    $loginModel = new LoginModel();
    
    // Use the getConnection() method to get the connection
    $connection = $loginModel->getConnection();  // Access connection via method

    // Fetch existing data
    $stmt = $connection->prepare("SELECT * FROM tourguide WHERE tg_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Guide not found.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update data after form submission
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $updateStmt = $connection->prepare("UPDATE tourguide SET tg_name = ?, tg_email = ?, tg_number = ? WHERE tg_id = ?");
        $updateStmt->bind_param("sssi", $name, $email, $phone, $id);
        $updateStmt->execute();

        // Redirect to the list page after update
        header("Location: ./control/login_control.php");
        exit();
    }
} else {
    die("Invalid request.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Tour Guide</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['tg_name']; ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $row['tg_email']; ?>" required><br>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['tg_number']; ?>" required><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>