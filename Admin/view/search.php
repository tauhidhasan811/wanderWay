<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/search.css">

</head>
<body onload ="onPageLoad()">
    <table>
        <form method="GET">
            <tr>
                <td>Enter useer ID:</td>
                <td><input type="number" id = 'adid' name="ad_id" onkeyup = 'searchById()'></td>
            </tr>
        
        </form>
    </table>
    <script src="../js/search.js"></script>
</body>
</html>
<p id='searchById'></p>

