<?php
include('Admin/model/home_model.php');

$gobj = new GetData();
$gconobj = $gobj->connection();

$data = $gobj->get_alldata($gconobj, 'package');
view_data($data);


function view_data($data)
{
    if ($data) {
        echo "<form action='Admin/view/package_view.php' method='GET'>";
        echo '<div class="button-container">';

        while ($row = $data->fetch_assoc()) {
            $id = $row['pk_id'];
            $title = $row['pk_title'];
            $location = $row['pk_location'];
            $validation = date("d-M",strtotime($row['pk_validation']));
            echo '<button class="custom-button" type="submit" name="pk_id" value="' .$id. '">';
            echo "ID: ".$id.'<br>'.'Title: '.$title.'<br>'.'Location: '.$location.'<br>'.'Last registrtion: '.$validation;
            echo '</button>';
        }

        echo '</div>';
        echo "</form>";
    } else {
        echo "No data found in the table.";
    }
}



?>
