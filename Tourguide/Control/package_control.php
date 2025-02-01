

<?php
include('../MODEL\package_model.php');
include('../MODEL\db.php');

if (isset($_POST['submit']))
{
    $gobj = new data_insert(); // Use the correct class name
    $gconobj = $gobj->connection(); // Get the database connection

    if (empty($_POST['title'])) 
    {
        echo "<p>title ccan not empty.</p><br>";
    }
    

    else if (empty($_POST['location'])) 
    {
        echo "<p>user name: ".$_POST['username']."<br></p>";
        echo "<p>Enter a valid Email with the .xyz domain</p><br>";
    }
    


    else
    {
        
        $obj = new data_insert();
        $conobj = $obj->connection();
        $check = $obj->insert_package(
            $conobj,
            $_POST['title'],
            $_POST['location'], 
            $_POST['duration'], 
            $_POST['validation'],
            $_POST['describtion'], 
        );
    }
    
}
else if(isset($_POST['login']))
{
    header( 'location: ./login.php');
}
?>