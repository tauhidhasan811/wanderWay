<?php
// Database Connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$database = "wanderway"; // Change to your actual database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch Packages
function getPackages() {
    global $conn;
    $query = "SELECT * FROM package";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Handle Package Booking
if (isset($_POST['book_package'])) {
    $pk_id = $_POST['pk_id'];

    // Fetch a random customer ID from the database
    $query = "SELECT cu_id FROM customer ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $cu_id = $row['cu_id']; // Assign a random valid customer ID
    } else {
        die("Error: No customers found in the database.");
    }

    $bk_date = date("Y-m-d H:i:s"); // Current date and time
    $bk_state = "Pending";

    $query = "INSERT INTO bookings (bk_date, bk_state, cu_id, pk_id) 
              VALUES ('$bk_date', '$bk_state', '$cu_id', '$pk_id')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Booking successful!'); window.location.href='package.php';</script>";
    } else {
        echo "Error booking package: " . mysqli_error($conn);
    }
}

// Update Package
if (isset($_POST['update_package'])) {
    $id = $_POST['pk_id'];
    $title = mysqli_real_escape_string($conn, $_POST['pk_title']);
    $desc = mysqli_real_escape_string($conn, $_POST['pk_des']);
    $location = mysqli_real_escape_string($conn, $_POST['pk_location']);
    $duration = mysqli_real_escape_string($conn, $_POST['pk_duration']);
    $validation = $_POST['pk_validation'];

    $query = "UPDATE package SET 
                pk_title='$title', 
                pk_des='$desc', 
                pk_location='$location', 
                pk_duration='$duration', 
                pk_validation='$validation' 
              WHERE pk_id=$id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Package updated successfully!'); window.location.href='package.php';</script>";
    } else {
        echo "Error updating package: " . mysqli_error($conn);
    }
}

$packages = getPackages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package List</title>
    <link rel="stylesheet" href="..\css\profile_design.css">
    <script>
        function openModal(id, title, desc, location, duration, validation) {
            document.getElementById('pk_id').value = id;
            document.getElementById('pk_title').value = title;
            document.getElementById('pk_des').value = desc;
            document.getElementById('pk_location').value = location;
            document.getElementById('pk_duration').value = duration;
            document.getElementById('pk_validation').value = validation;
            document.getElementById('updateModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('updateModal').style.display = 'none';
        }
    </script>
</head>
<body>

<h2>Package List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Location</th>
        <th>Duration</th>
        <th>Validation</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($packages)) { ?>
        <tr>
            <td><?php echo $row['pk_id']; ?></td>
            <td><?php echo $row['pk_title']; ?></td>
            <td><?php echo $row['pk_des']; ?></td>
            <td><?php echo $row['pk_location']; ?></td>
            <td><?php echo $row['pk_duration']; ?></td>
            <td><?php echo $row['pk_validation']; ?></td>
            <td>
                <button onclick="openModal(
                    '<?php echo $row['pk_id']; ?>',
                    '<?php echo addslashes($row['pk_title']); ?>',
                    '<?php echo addslashes($row['pk_des']); ?>',
                    '<?php echo addslashes($row['pk_location']); ?>',
                    '<?php echo $row['pk_duration']; ?>',
                    '<?php echo $row['pk_validation']; ?>'
                )">Update</button>

                <!-- Booking Button -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="pk_id" value="<?php echo $row['pk_id']; ?>">
                    <button type="submit" name="book_package">Book Now</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- Modal -->
<div id="updateModal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:#fff; padding:20px; border:1px solid #000;">
    <h2>Update Package</h2>
    <form method="post">
        <input type="hidden" id="pk_id" name="pk_id">
        <label>Title: <input type="text" id="pk_title" name="pk_title"></label><br>
        <label>Description: <input type="text" id="pk_des" name="pk_des"></label><br>
        <label>Location: <input type="text" id="pk_location" name="pk_location"></label><br>
        <label>Duration: <input type="text" id="pk_duration" name="pk_duration"></label><br>
        <label>Validation: 
            <select id="pk_validation" name="pk_validation">
                <option value="Valid">Valid</option>
                <option value="Expired">Expired</option>
            </select>
        </label><br>
        <button type="submit" name="update_package">Update</button>
        <button type="button" onclick="closeModal()">Cancel</button>
    </form>
</div>

</body>
</html>

<?php
mysqli_close($conn); // Close the database connection
?>
