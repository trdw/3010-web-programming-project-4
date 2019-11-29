function checkInput() {
    if (checkPassword() &&
    checkAddress1() &&
    checkAddress2() &&
    checkBirth() &&
    checkCity() &&
    checkEmail() &&
    checkFirstName() &&
    checkGender() &&
    checkLastName() &&
    checkMaritalStatus() &&
    checkPasswordRepeat() &&
    checkPhone() &&
    checkState() &&
    checkUserName() &&
    checkZip()) {
        document.getElementById("submitbutton").disabled = false;

    } else {
        document.getElementById("submitbutton").disabled = "disabled";
    }
}
function checkUserName() {
    var group = "userName";
    var username = document.getElementById(group);
    if (username.value.length < 6 || username.value.length > 50) {
        errorFormGroup(group, "Invalid user name!");
        return false;
    } else {
        validFormGroup(group, "Valid user name!");
    }
    return true;
}
function checkPassword() {
    var group = "password";
    var password = document.getElementById(group).value;
    if (password.length < 8 || password.length > 50 ||
        password.match(/[!@#$%^&*()_+\-=\[\]{};':"\\]/) === null ||
        password.match(/[a-z]/) === null ||
        password.match(/[A-Z]/) === null ||
        password.match(/[0-9]/) === null ) {
        errorFormGroup(group, "Invalid password!");
        return false;
    } else {
        validFormGroup(group, "Valid password!");
    }
    return true;
}
function checkPasswordRepeat() {
    var password = document.getElementById("password").value;
    var passwordRepeat = document.getElementById("passwordRepeat").value;
    if (checkPassword()) {
        if (password !== passwordRepeat) {
            errorFormGroup("passwordRepeat", "Passwords must match!");
            return false;
        } else if (passwordRepeat.length < 8 || passwordRepeat.length > 50 ||
            passwordRepeat.match(/[!@#$%^&*()_+\-=\[\]{};':"\\]/) === null ||
            passwordRepeat.match(/[a-z]/) === null ||
            passwordRepeat.match(/[A-Z]/) === null ||
            passwordRepeat.match(/[0-9]/) === null ) {
            errorFormGroup("passwordRepeat", "Invalid password!");
            return false;
        } else {
            validFormGroup("passwordRepeat", "Passwords match!")
        }
    }
    return true;
}
function checkFirstName() {
    var group = "firstName";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a first name.");
        return false;
    } else if (entry.length > 50) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkLastName() {
    var group = "lastName";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a last name.");
        return false;
    } else if (entry.length > 50) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkEmail() {
    var group = "email";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter an email address.");
        return false;
    } else if (entry.match(/^[\w.+\-]+@[\w.\-]+\.[\w]+$/) === null) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkPhone() {
    var group = "phone";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a phone number.");
        return false;
    } else if (entry.length < 10 || entry.length > 12 ||
        (entry.match(/^[0-9]{10}$/) === null &&
        entry.match(/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/) === null)) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
        if (entry.match(/^[0-9]{10}$/) !== null) {
            document.getElementById(group).value = entry.substring(0,3) + "-" + entry.substring(3,6) + "-" + entry.substring(6,10);
        }
    }
    return true;
}
function checkBirth() {
    var group = "birth";
    var entry = document.getElementById(group).valueAsDate;
    var oldest = new Date("January 1, 1900 00:00:00");
    if (entry === null) {
        errorFormGroup(group, "Please enter a birth date.");
        return false;
    } else if (entry < oldest || entry > new Date()) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkAddress1() {
    var group = "address1";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter an address.");
        return false;
    } else if (entry.length > 100) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkAddress2() {
    var group = "address2";
    var entry = document.getElementById(group).value;
    if (entry.length > 100) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else if (entry.length > 0) {
        validFormGroup(group, "Valid entry.");
    } else {
        resetFormGroup(group);
    }
    return true;
}
function checkCity() {
    var group = "city";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a city.");
        return false;
    } else if (entry.length > 50) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkState() {
    var group = "state";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a state.");
        return false;
    } else if (entry.length > 52) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkZip() {
    var group = "zip";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a zip code.");
        return false;
    } else if (entry.length < 5 || entry.length > 10 ||
        (entry.match(/^[0-9]{5}$/) === null &&
            entry.match(/^[0-9]+-[0-9]+$/) === null)) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
        if (entry.match(/^[0-9\-]{10}$/) !== null) {
            var digits = entry.match(/^[0-9]+/) + entry.match(/[0-9]+$/);
            document.getElementById(group).value = digits.substring(0,5) + "-" + digits.substring(5,10);
        }
    }
    return true;
}
function checkGender() {
    var group = "gender";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a gender.");
        return false;
    } else if (entry.length > 50) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function checkMaritalStatus() {
    var group = "maritalStatus";
    var entry = document.getElementById(group).value;
    if (entry === "") {
        errorFormGroup(group, "Please enter a marital status.");
        return false;
    } else if (entry.length > 50) {
        errorFormGroup(group, "Invalid entry.");
        return false;
    } else {
        validFormGroup(group, "Valid entry.");
    }
    return true;
}
function errorFormGroup(group, message) {
    var groupDiv = document.getElementById(group + "Div");
    var groupErr = document.getElementById(group + "Err");
    if (groupDiv) {
        groupDiv.classList.add("has-error");
        groupDiv.classList.remove("has-success");
    }
    if (groupErr) {
        groupErr.classList.remove("hide");
        groupErr.classList.add("show");
        groupErr.innerHTML = message;
    }
    document.getElementById("submitbutton").disabled = "disabled";
}
function validFormGroup(group, message) {
    var groupDiv = document.getElementById(group + "Div");
    var groupErr = document.getElementById(group + "Err");
    if (groupDiv) {
        groupDiv.classList.remove("has-error");
        groupDiv.classList.add("has-success");
    }
    if (groupErr) {
        groupErr.classList.remove("hide");
        groupErr.classList.add("show");
        groupErr.innerHTML = message;
    }
    document.getElementById("submitbutton").disabled = false;
}
function resetFormGroup(group) {
    var groupDiv = document.getElementById(group + "Div");
    var groupErr = document.getElementById(group + "Err");
    if (groupDiv) {
        groupDiv.classList.remove("has-error");
        groupDiv.classList.remove("has-success");
    }
    if (groupErr) {
        groupErr.classList.add("hide");
        groupErr.classList.remove("show");
    }
    document.getElementById("submitbutton").disabled = "disabled";
}
function resetForm() {
    resetFormGroup("userName");
    resetFormGroup("password");
    resetFormGroup("passwordRepeat");
    resetFormGroup("firstName");
    resetFormGroup("lastName");
    resetFormGroup("email");
    resetFormGroup("phone");
    resetFormGroup("birth");
    resetFormGroup("address1");
    resetFormGroup("address2");
    resetFormGroup("city");
    resetFormGroup("state");
    resetFormGroup("zip");
    resetFormGroup("gender");
    resetFormGroup("maritalStatus");
}