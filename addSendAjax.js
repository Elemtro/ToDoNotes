document.getElementById('form').addEventListener("submit", function(event) {
    event.preventDefault(); //prevent form submit

    var formData = new FormData(this);

    // Send form data using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "models/adding_note.php", true);
    xhr.onerror = function() {
        console.error("Error submitting form");
    };
    xhr.send(formData);

    xhr.onload = function() {
        if (xhr.status == 200) {
            if (xhr.responseText.trim() !== "") {
                var response = JSON.parse(xhr.responseText);
                handleResponse(response);
            } else {
                console.log("No errors, cool");
            }
        }
    };
})

function handleResponse(response) {
    // Clear previous error messages
    document.getElementById("error_email").innerHTML = "";
    document.getElementById("error_password").innerHTML = "";

    // Check for errors and display them
    if (response.hasOwnProperty("errors")) {
        if (response.errors.hasOwnProperty("email")) {
            document.getElementById("error_email").innerHTML = response.errors.email;
        }
        if (response.errors.hasOwnProperty("password")) {
            document.getElementById("error_password").innerHTML = response.errors.password;
        }
    }
}