<?php
public function delete($conobj, $table, $id)
{
    $stmt = $conobj->prepare("DELETE FROM $table WHERE ad_id = $id");

    if (!$stmt) {
        die("Query preparation failed: " . $conobj->error);
    }
    $stmt->execute();
}

?>