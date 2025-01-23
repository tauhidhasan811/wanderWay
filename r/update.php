<?php
require("../MODEL/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $connection = new mysqli("localhost", "root", "", "WANDERWAY");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE guid SET name='$name', mail='$email', phone='$phone' WHERE id=$id";

        if ($connection->query($sql) === TRUE) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }

    $result = $connection->query("SELECT * FROM guid WHERE id=$id");
    $data = $result->fetch_assoc();
    ?>

    <form method="post">
        <label>Name: <input type="text" name="name" value="<?php echo $data['name']; ?>"></label><br>
        <label>Email: <input type="text" name="email" value="<?php echo $data['mail']; ?>"></label><br>
        <label>Phone: <input type="text" name="phone" value="<?php echo $data['phone']; ?>"></label><br>
        <button type="submit">Update</button>
    </form>

    <?php
}
?>
