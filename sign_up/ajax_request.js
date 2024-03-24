document.getElementById("signup-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            var formData = new FormData(this);

            // Send form data using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../models/signing.php", true);
            xhr.onerror = function() {
                // Handle error
                console.error("Error submitting form");
            };
            xhr.send(formData);

            xhr.onload = function() {
                if (xhr.status == 200) {
                    if (xhr.responseText.trim() !== "") {
                        var response = JSON.parse(xhr.responseText);
                        handleResponse(response);
                    } else {
                        window.location.href = "../index.php?signup_success=true";
                    }
                    // If request is successful, handle the response
                }
            };
        });

function handleResponse(response) {
    // Clear previous error messages
    document.getElementById("error_email").innerHTML = "";
    document.getElementById("error_password").innerHTML = "";
    document.getElementById("error_confirm_password").innerHTML = "";

    // Check for errors and display them
    if (response.hasOwnProperty("errors")) {
        if (response.errors.hasOwnProperty("email")) {
            document.getElementById("error_email").innerHTML = response.errors.email;
        }
        if (response.errors.hasOwnProperty("password")) {
            document.getElementById("error_password").innerHTML = response.errors.password;
        }
        if (response.errors.hasOwnProperty("confirm")) {
            document.getElementById("error_confirm_password").innerHTML = response.errors.confirm;
        }
    }
}