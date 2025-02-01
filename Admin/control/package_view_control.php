<?php
include_once('../model/package_view_model.php');
$gobj = new GetData();
$gconobj = $gobj->connection();
$data = $gobj->get_alldataByID($gconobj, 'package', $_GET['pk_id']);
view_data($data);
function view_data($data) {
    if ($data) {
        echo '<table>';
        while ($row = $data->fetch_assoc()) {
            echo '<tr>';
            echo '<td> Package ID: ';
            echo '<td>' . $row['pk_id'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Package Title: ';
            echo '<td>' . $row['pk_title'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Location: ';
            echo '<td>' . $row['pk_location'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Last date : ';
            echo '<td>' . $row['pk_validation'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> Describtion: ';
            echo '<td>' . $row['pk_des'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data found in the table.";
    }
}
?>
