<?php
include('../model/show_model.php');

$gobj = new GetData();
$gconobj = $gobj->connection();

if ((!isset($_POST['search']))) {
    $data = $gobj->get_alldata($gconobj, 'customer');
    view_data($data);
} elseif (isset($_POST['search']) && !empty($_POST['email'])) {
    $_POST['email'];
    $data = $gobj->get_alldataByEamil($gconobj, 'customer', $_POST['email']);
    view_data($data);
} 

function view_data($data) {
    if ($data) {
        echo '<table border="1">';
        echo '<tr>
                <th>ID</th>
                <th>Name</th>
                <th>address</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Phone Number</th>
              </tr>';

        while ($row = $data->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['cu_id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cu_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cu_address']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cu_email']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cu_number']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cu_gender']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cu_nationality']) . '</td>';
            
            echo '<td><a href="../view/profile.php?ad_id=' . urlencode($row['cu_email']) . '">View Profile</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data found in the table.";
    }
}
?>
