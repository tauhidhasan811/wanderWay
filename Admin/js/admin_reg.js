
    function validateForm() {
        username = document.getElementById('name').value;
        email = document.getElementById('email').value;
        password = document.getElementById('password').value;
        confirmPassword = document.getElementById('confirm_password').value;
        dropTest = document.getElementById('drop_test').files[0];
        profilePicture = document.getElementById('profile_picture').files[0];

        if (username === "") {
            document.getElementById('usenameError').innerHTML = "*Username is required.";
            return false;
        }
        else if (!/^[a-zA-Z\s]+$/.test(username)) {
            document.getElementById('usenameError').innerHTML = "*Username must only contain alphabetic characters and spaces.";
            return false;
        }
        else if (email === "") {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = "*Email is required.";
            return false;
        }
        else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/.test(email)) {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('emailError').innerHTML = "*Enter a valid Email with the .com domain.";
            return false;
        }
        else if (password === "") {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('passwordError').innerHTML = "*Password is required.";
            return false;
        }
        else if (password.length <= 6 || !/[0-9]/.test(password) || !/[a-zA-Z]/.test(password)) {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('passwordError').innerHTML ='';
            if (password.length <= 6) 
            {
                document.getElementById('passwordError').innerHTML = "*Password must be longer than 6 characters.";
            } else if (!/[0-9]/.test(password)) {
                document.getElementById('passwordError').innerHTML = "*Password must contain at least one numeric character.";
            } else if (!/[a-zA-Z]/.test(password)) {
                document.getElementById('passwordError').innerHTML = "*Password must contain at least one alphabetic character.";
            }
            return false;
        }
        else if (confirmPassword === "") {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('passwordError').innerHTML ='';
            document.getElementById('conpasswordError').innerHTML = "*Confirm Password is required.";
            return false;
        }
        else if (password !== confirmPassword) {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('passwordError').innerHTML ='';
            document.getElementById('conpasswordError').innerHTML ='';
            document.getElementById('conpasswordError').innerHTML = "*Password and Confirm Password must be the same.";
            return false;
        }
        else if (dropTest == null) {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('passwordError').innerHTML ='';
            document.getElementById('conpasswordError').innerHTML ='';
            document.getElementById('fileError').innerHTML = "*You must upload a Drop test report.";
            return false;
        }
        else if (!dropTest) {
            document.getElementById('usenameError').innerHTML= "";
            document.getElementById('emailError').innerHTML = '';
            document.getElementById('passwordError').innerHTML ='';
            document.getElementById('conpasswordError').innerHTML ='';
            document.getElementById('fileError').innerHTML = '';
            document.getElementById('fileError').innerHTML = "*You must upload a Drop test report.";
            return false;
        }
        else if (profilePicture) {
            var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
            var fileExtension = profilePicture.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                document.getElementById('usenameError').innerHTML= "";
                document.getElementById('emailError').innerHTML = '';
                document.getElementById('passwordError').innerHTML ='';
                document.getElementById('conpasswordError').innerHTML ='';
                document.getElementById('fileError').innerHTML = '';
                document.getElementById('PPError').innerHTML = "*Profile picture must be an image file (jpg, jpeg, png, gif, webp, avif).";
                return false;
            }
        }
        else
        {
            return true;
        }
    }
function page_change()
{
    window.location.href='login.php';
}
