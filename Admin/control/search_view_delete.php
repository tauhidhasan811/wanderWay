<?php
if (isset($_GET['delete']) && !empty($_GET['ad_id'])) {
    include('../model/search_view_delete_model.php');
    $gobj = new DeleteData();
    $gconobj = $gobj->connection();
    $ad_id = $_GET['ad_id'];
    $delete = $gobj->delete($gconobj, 'admin', $ad_id);

    if ($delete) {
        header('Location: search.php');
        exit();  
    } else {
        echo "Failed to delete the record.";
    }
}
?>
