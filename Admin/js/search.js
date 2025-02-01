function searchById() {
    var adId = document.getElementById('adid').value;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('searchById').innerHTML = this.responseText;
        }
    };

    xhttp.open('GET', '../control/search_control.php?action=searchById&ad_id=' + encodeURIComponent(adId), true);
    xhttp.send();
}
function onPageLoad()
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('searchById').innerHTML = this.responseText;
        }
    };

 
    xhttp.open('GET', '../control/search_control.php?action=""', true);
    xhttp.send();
}
