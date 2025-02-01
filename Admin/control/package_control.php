

<?php
include('../model/package_model.php');

if (isset($_POST['submit']))
{
    if (empty($_POST['title'])) 
    {
        echo "<p>title can not empty.</p><br>";
    }
    else if(empty($_POST['location'])) 
    {
        echo "<p>user name: ".$_POST['title']."<br></p>";
        echo "<p>Enter a valid Email with the .xyz domain</p><br>";
    }
    else
    {
        $obj = new DataInsert();
        $conobj = $obj->connection();
        $check = $obj->insert_package(
            $conobj,
            $_POST['title'],
            $_POST['location'], 
            $_POST['duration'], 
            $_POST['validation'],
            $_POST['describtion'], 
            $_POST['tg_id']
        );
    }
    
}
else if(isset($_POST['login']))
{
    header( 'location: login.php');
}
?>