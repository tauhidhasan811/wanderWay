<?php

if (isset($_GET['delete'])) {
    $ad_id = $_GET['ad_id'];  
    include('../model/search_view_delete_model.php');
    
    $gobj = new DeleteData();
    $gconobj = $gobj->connection();
    $delete = $gobj->delete($gconobj, 'admin', $ad_id);

    if ($delete) {
        header('Location: search.php');
        exit(); 
    } else {
        echo "Failed to delete the record.";
    }
}
else {
    include_once('../model/search_view_model.php');
    session_start();
    $gobj = new GetData();
    $gconobj = $gobj->connection();
    $data = $gobj->get_alldataByID($gconobj, 'admin', $_GET['ad_id']);
    view_data($data);
}

function view_data($data) {
    if ($data) {
        echo '<table>';
        while ($row = $data->fetch_assoc()) {
            echo '<tr>';
            echo '<td> User ID: ';
            echo '<td>' . $row['ad_id'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> User NAME: ';
            echo '<td>' . $row['ad_name'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> User email: ';
            echo '<td>' . $row['ad_email'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> User Role: ';
            echo '<td>' . $row['ad_role'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Phone: ';
            echo '<td>' . $row['ad_number'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Date of Birth: ';
            echo '<td>' . $row['ad_DOB'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Join date: ';
            echo '<td>' . $row['ad_joinDate'] . '</td>';
            echo '</tr>';

            // Display delete button only if the current user is a super admin
            if ($row['ad_role'] != 'super_admin' && $_SESSION['role'] == 'super_admin') {
                echo '<form action="" method="GET">';
                echo '<tr>';
                echo '<td><input type="hidden" name="ad_id" value="' . $row['ad_id'] . '"></td>';  // Pass ad_id in the hidden input
                echo '<td><input type="submit" name="delete" id="delete" class="delete" value="Delete"></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data found in the table.";
    }
}
?>
