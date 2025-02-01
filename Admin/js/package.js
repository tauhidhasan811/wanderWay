
function validateForm() {
    tgID = document.getElementById('tg_id').value;
    title = document.getElementById('title').value;
    locations = document.getElementById('location').value;
    
    if (tgID === "") {
        document.getElementById('iderror').innerHTML = "*ID is required.";
        return false;
    }
   
    else if (title === "")
    {
        document.getElementById('iderror').innerHTML= "";
        document.getElementById('titleerror').innerHTML = "*Title is required.";
        return false;
    }
    
    else if (locations === "") {
        document.getElementById('iderror').innerHTML= "";
        document.getElementById('titleerror').innerHTML = '';
        document.getElementById('locationError').innerHTML = "*Location is required.";
        return false;
    }
    else
    {
        return true;
    }
}
function page_change()
{
window.location.href='admin_profile.php';
}
