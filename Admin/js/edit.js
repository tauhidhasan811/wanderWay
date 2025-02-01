function validateForm() {
    email = document.getElementById('email').value;
    password = document.getElementById('password').value;
    confirmPassword = document.getElementById('confirm_password').value;
    profilePicture = document.getElementById('profile_picture').files[0];

    // Clear previous error messages
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';
    document.getElementById('conpasswordError').innerHTML = '';
    document.getElementById('PPError').innerHTML = '';

    // Validate Email
    if (email === "") {
        document.getElementById('emailError').innerHTML = "*Email is required.";
        return false;
    }
    else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
        document.getElementById('emailError').innerHTML = "*Enter a valid email address.";
        return false;
    }

    // Validate Password
    if (password === "") {
        document.getElementById('passwordError').innerHTML = "*Password is required.";
        return false;
    }
    else if (password.length <= 6 || !/[0-9]/.test(password) || !/[a-zA-Z]/.test(password)) {
        if (password.length <= 6) 
        {
            document.getElementById('passwordError').innerHTML = "*Password must be longer than 6 characters.";
        } 
        else if (!/[0-9]/.test(password)) {
            document.getElementById('passwordError').innerHTML = "*Password must contain at least one numeric character.";
        } 
        else if (!/[a-zA-Z]/.test(password)) {
            document.getElementById('passwordError').innerHTML = "*Password must contain at least one alphabetic character.";
        }
        return false;
    }

    // Validate Confirm Password
    if (confirmPassword === "") {
        document.getElementById('conpasswordError').innerHTML = "*Confirm Password is required.";
        return false;
    }
    else if (password !== confirmPassword) {
        document.getElementById('conpasswordError').innerHTML = "*Password and Confirm Password must be the same.";
        return false;
    }
    

    else if (profilePicture ==="") {
        document.getElementById('emailError').innerHTML = '';
        document.getElementById('passwordError').innerHTML ='';
        document.getElementById('conpasswordError').innerHTML ='';
        document.getElementById('fileError').innerHTML = "*You must upload PP.";
        return false;
    }

    // Validate Profile Picture
    else if (profilePicture) {
        var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        var fileExtension = profilePicture.name.split('.').pop().toLowerCase();

        if (!allowedExtensions.includes(fileExtension)) {
            document.getElementById('PPError').innerHTML = "*Profile picture must be an image file (jpg, jpeg, png, gif, webp, avif).";
            return false;
        }

       
    }
    else{

        return true;
    }
     // If all validations pass
}

function profile_Change() {
    var input = document.getElementById('profile_picture');
    var preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            preview.src = e.target.result; // Set the preview image source
        };

        reader.readAsDataURL(input.files[0]); // Read the selected file as a data URL
    }
}

function page_change()
{
    window.location.href='admin_profile.php';
}
