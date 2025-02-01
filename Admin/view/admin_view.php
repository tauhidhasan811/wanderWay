<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="../desgine/style.css">

</head>
<body>
    <table>
        <form method="POST">
            <tr>
                <td>User ID:</td>
                <td><input type="text" name="ad_id"></td>
            </tr>
            <tr>
                <td><input type="submit" name="search" value="Search"></td>
                <td><input type="submit" name="advance_search" value="Advance Search"></td>
            </tr>
        </form>
    </table>
</body>
</html>

<?php
include('../control/data_control.php');
?>
