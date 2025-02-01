const ValidationModel = {
    isEmpty: function (value) {
        return value.trim() === "";
    },

    isValidEmail: function (email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    },

    isValidPhone: function (phone) {
        return /^\d{10,11}$/.test(phone);  // Allows 10 or 11 digits
    },

    isValidNid: function (nid) {
        return /^\d{4,10}$/.test(nid); // Allows between 4 to 17 digits
    },

    isValidPassword: function (password) {
        return password.length >= 5;  // Matches the validation check in `validate_form.js`
    }
};

export default ValidationModel;
