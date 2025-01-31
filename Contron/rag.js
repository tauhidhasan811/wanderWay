alert("JavaScript Loaded Successfully!");

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const errorDiv = document.getElementById("error-messages");

    form.addEventListener("submit", function (event) {
        let errors = [];
        errorDiv.innerHTML = ""; // Clear previous errors

        const name = document.querySelector("input[name='full_name']").value.trim();
        const email = document.querySelector("input[name='email']").value.trim();
        const phone = document.querySelector("input[name='phone']").value.trim();
        const password = document.querySelector("input[name='password']").value.trim();
        const confirmPassword = document.querySelector("input[name='confirm_password']").value.trim();
        const gender = document.querySelector("select[name='gender']").value;
        const dob = document.querySelector("input[name='dob']").value;
        const address = document.querySelector("input[name='address']").value.trim();
        const experience = document.querySelector("input[name='experience']").value.trim();
        const languages = document.querySelector("input[name='languages']").value.trim();
        const locations = document.querySelector("input[name='locations']").value.trim();
        const drivingExperience = document.querySelector("input[name='driving_experience']:checked");
        const passportNumber = document.querySelector("input[name='passport_number']").value.trim();
        const nationality = document.querySelector("input[name='nationality']").value.trim();
        const availability = document.querySelector("select[name='availability']").value;

        if (!name.match(/^[a-zA-Z ]+$/) || name.length === 0) {
            errors.push("Invalid name. Only letters and spaces are allowed.");
        }

        if (!email.match(/^\S+@\S+\.\S+$/) || email.length === 0) {
            errors.push("Invalid email format.");
        }

        if (!phone.match(/^\d{11}$/)) {
            errors.push("Invalid phone number. Must be 11 digits.");
        }

        if (!password.match(/[@$&]/) || password.length < 6) {
            errors.push("Password must be at least 6 characters long and contain a special character (@, $, &).");
        }

        if (password !== confirmPassword) {
            errors.push("Passwords do not match.");
        }

        if (gender === "") {
            errors.push("Please select a gender.");
        }

        if (dob === "") {
            errors.push("Date of Birth is required.");
        }

        if (address === "") {
            errors.push("Address is required.");
        }

        if (!experience.match(/^\d+$/) || experience < 0) {
            errors.push("Experience must be a positive number.");
        }

        if (languages === "") {
            errors.push("Languages spoken are required.");
        }

        if (locations === "") {
            errors.push("Preferred tour locations are required.");
        }

        if (!drivingExperience) {
            errors.push("Please specify your driving experience.");
        }

        if (passportNumber === "") {
            errors.push("Passport number is required.");
        }

        if (nationality === "") {
            errors.push("Nationality is required.");
        }

        if (availability === "") {
            errors.push("Please select an availability option.");
        }

        if (errors.length > 0) {
            event.preventDefault(); // Stop form submission
            errorDiv.innerHTML = "<ul style='color: red;'>" + errors.map(e => `<li>${e}</li>`).join("") + "</ul>";
        }
    });
});
