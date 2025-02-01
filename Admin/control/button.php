<?php
if($_SESSION['role'] =='content_manager')
{
    echo '<button type="button" class="package" name="package" onclick="page_change_package()">Create package</button>';

}
?>