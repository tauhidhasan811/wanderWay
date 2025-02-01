<?php
include('../model/search_model.php');

$gobj = new GetData();
$gconobj = $gobj->connection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'];

    if ($action === 'searchById') {
        $ad_id = $_GET['ad_id'];

        if ($ad_id) {
            $data = $gobj->get_alldataByID($gconobj, 'admin', $ad_id);
            view_data($data);
        }
        else
        {
            $data = $gobj->get_alldata($gconobj, 'admin');
            view_data($data);
        }
    }
    else {
        $data = $gobj->get_alldata($gconobj, 'admin');
        view_data($data);
    }
} 
else 
{
    $data = $gobj->get_alldata($gconobj, 'admin');
    view_data($data);
}

function view_data($data)
{
    if ($data) {
        echo "<form action='search_view.php' method='GET'>";
        echo '<div class="button-container">';

        while ($row = $data->fetch_assoc()) {
            $pp = $row['ad_pp'];
            $name = $row['ad_name'];
            $id = $row['ad_id'];
            $role = $row['ad_role'];
            echo '<button class="custom-button" type="submit" name="ad_id" value="' . $id . '">';
            echo '<img src="' . $pp . '" alt="Icon">';
            echo htmlspecialchars($name) . " (" . htmlspecialchars($role) . ')';
            echo '</button>';
        }

        echo '</div>';
        echo "</form>";
    } else {
        echo "No data found in the table.";
    }
}
?>
