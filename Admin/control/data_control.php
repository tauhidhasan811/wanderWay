<?php
include('../model/db_get_data.php');

$gobj = new GetData();
$gconobj = $gobj->connection();

if (!isset($_POST['advance_search']) && !isset($_POST['search']) && !isset($_POST['search_advanced'])) {
    $data = $gobj->get_alldata($gconobj, 'admin');
    view_data($data);
} elseif (isset($_POST['search']) && !empty($_POST['ad_id'])) {
    $ad_id = $_POST['ad_id'];
    $data = $gobj->get_alldataByID($gconobj, 'admin', $ad_id);
    view_data($data);
} elseif (isset($_POST['advance_search'])) {
    echo '<form method="POST">';
    echo '<table>';
    echo '<tr>
            <td><input type="text" name="ad_id" placeholder="ID"></td>
            <td><input type="text" name="name" placeholder="Name"></td>
            <td><input type="text" name="number_of_row" placeholder="Number of Rows"></td>
          </tr>';
    echo '<tr>
            <td colspan="3"><input type="submit" name="search_advanced" value="Search Advanced"></td>
          </tr>';
    echo '</table>';
    echo '</form>';
} elseif (isset($_POST['search_advanced'])) {
    $ad_id = !empty($_POST['ad_id']) ? $_POST['ad_id'] : null;
    $name = !empty($_POST['name']) ? $_POST['name'] : null;
    $number_of_row = !empty($_POST['number_of_row']) ? $_POST['number_of_row'] : null;

    if (!empty($ad_id) && !empty($name)) {
        $data = empty($number_of_row) 
            ? $gobj->get_alldataByIDAndName($gconobj, 'admin', $ad_id, $name) 
            : $gobj->get_alldataByIDAndNameAndLimit($gconobj, 'admin', $ad_id, $name, $number_of_row);
    } elseif (!empty($number_of_row)) {
        $data = $gobj->get_alldataByLimit($gconobj, 'admin', $number_of_row);
    } else {
        echo "Please fill in all required fields.";
        $data = null;
    }
    view_data($data);
} else {
    $data = null;
}

function view_data($data) {
    if ($data) {
        echo '<table border="1">';
        echo '<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Image</th>
                <th>Action</th>
              </tr>';

        while ($row = $data->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['ad_id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['ad_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['ad_email']) . '</td>';
            echo '<td>' . htmlspecialchars($row['ad_role']) . '</td>';
            echo '<td><img src="' . htmlspecialchars($row['ad_pp']) . '" alt="Profile Picture" width="100" height="100"></td>';
            echo '<td><a href="../view/profile.php?ad_id=' . urlencode($row['ad_id']) . '">View Profile</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data found in the table.";
    }
}
?>
