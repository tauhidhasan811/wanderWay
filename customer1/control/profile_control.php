<?php
session_start();
include('../model/profile_model.php');

$gobj = new GetData();
$gconobj = $gobj->connection();

$data = $gobj->get_alldataByID($gconobj, 'customer', $_SESSION['email']);
view_data($data);


function view_data($data) {
    if ($data) {
        echo '<table>';
   

        while ($row = $data->fetch_assoc()) {
           
            echo '<tr>';
            echo '<td> USER ID: ';
            echo '<td>' . htmlspecialchars($row['cu_id']) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> USER NAME: ';
            echo '<td>' . htmlspecialchars($row['cu_name']) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> USER email: ';
            echo '<td>' . htmlspecialchars($row['cu_email']) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> GENDER: ';
            echo '<td>' . htmlspecialchars($row['cu_gender']) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> ADDRESS: ';
            echo '<td>' . htmlspecialchars($row['cu_address']) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> NATIONALITY: ';
            echo '<td>' . htmlspecialchars($row['cu_nationality']) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td> PHONE NUMBER: ';
            echo '<td>' . htmlspecialchars($row['cu_number']) . '</td>';
            echo '</tr>';
           
            
            
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data found in the table.";
    }
    if(isset($_POST['delete'])){
        $gobj = new GetData();
        $gconobj = $gobj->connection();
        $gobj->delete($gconobj, 'customer', $_SESSION['email']);
    }
}
?>

