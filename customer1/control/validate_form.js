import ValidationModel from '../model/validation.js';

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let errors = [];

        const username = form.username.value.trim();
        const address = form.address.value.trim();
        const email = form.email.value.trim();
        const phone = form.phone.value.trim();
        const password = form.password.value.trim();
        const nidnum = form.nidnum.value.trim();
        const nationality = form.nationality.value.trim();
        const econtactnumber = form.econtactnumber.value.trim();
        const gender = form.querySelector("input[name='gender']:checked");
        const image = form.image.files.length; // Check if file is uploaded

        if (ValidationModel.isEmpty(username)) {
            errors.push("Username is required.");
        }

        if (ValidationModel.isEmpty(address)) {
            errors.push("Address is required.");
        }

        if (!ValidationModel.isValidEmail(email)) {
            errors.push("Invalid email format.");
        }

        if (!ValidationModel.isValidPhone(phone)) {
            errors.push("Phone number must be 10 or 11 digits.");
        }

        if (!ValidationModel.isValidPassword(password)) {
            errors.push("Password must be at least 5 characters long.");
        }

        if (!gender) {
            errors.push("Gender selection is required.");
        }

        if (!ValidationModel.isValidNid(nidnum)) {
            errors.push("NID must be between 4 to 10 digits.");
        }

        if (ValidationModel.isEmpty(nationality)) {
            errors.push("Nationality is required.");
        }

        if (!ValidationModel.isValidPhone(econtactnumber)) {
            errors.push("Emergency contact must be 10 or 11 digits.");
        }

        if (image === 0) {
            errors.push("ID proof upload is required.");
        }

        if (errors.length > 0) {
            event.preventDefault();
            alert(errors.join("\n"));
        }
    });
});
