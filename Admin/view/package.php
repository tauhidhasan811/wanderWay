<!DOCTYPE html>
<html lang="en">
<head>
    <title>Package create</title>
    <link rel="stylesheet" type="text/css" href="../css/package.css">
</head>
<body>
    <form action= '' method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <h2>Create your package</h2>
        <fieldset>
            <legend>Package Information</legend>
            <table>
            <tr>
                    <td>Gide ID:</td>
                    <td><input type="text" id= 'tg_id' name="tg_id" class = 'input' ></td>
                </tr>
                <tr>
                    <td></td><td id='iderror' class= 'error'></td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input id= 'title' type="title" name="title" class = 'input' > <br></td>
                    
                </tr>
                <tr>
                    <td></td><td id='titleerror' class= 'error'></td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td><input type="text" id  = 'location' name="location" class = 'input'></td>
                </tr>
                <tr>
                    <td></td><td id='locationError' class= 'error'></td>
                </tr>
                <tr>
                    <td>Duration:</td>
                    <td><input type="number" id= 'duration' name="duration" class = 'input_box' ></td>
                </tr>
                
                
                <tr>
                    <td>Validation:</td>
                    <td><input type="date" name="validation" class = 'input_box'></td>
                </tr>
                
                <tr>
                    <td>Describtion:</td>
                    <td><input type="text" name="describtion" class = 'input'></td>
                </tr>
                
            </table>
        </fieldset>
        
        <button type="submit" name = "submit" class = 'submit'>Create</button>
        <button type="button" class = 'login' onclick = "page_change()">Profile</button>
       
    </form>
    <script src="../js/package.js"></script>
</body>
</html>
<?php
include('../control/package_control.php');
?>




