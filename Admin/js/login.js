function validLogin() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Clear previous error messages
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';

    // Validate email
    if (email === "") {
        document.getElementById('emailError').innerHTML = "*Email is required.";
        return false;
    }

    // Validate password
    if (password === "") {
        document.getElementById('passwordError').innerHTML = "*Password is required.";
        return false;
    }

    // If both fields are filled, return true
    return true;
}
function page_change()
{
    window.location.href='admin_registration_page.php';
}
function page_change_home()
{
    window.location.href='../../home.php';
}
