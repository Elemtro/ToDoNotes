document.getElementById('form').addEventListener("submit", function(event) {
    event.preventDefault(); //prevent form submit

    var formData = new FormData(this);

    // Send form data using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../models/logining.php", true);
    xhr.onerror = function() {
        console.error("Error submitting form");
    };
    xhr.send(formData);

    xhr.onload = function() {
        if (xhr.status == 200) {
            if (xhr.responseText.trim() !== "") {
                console.log(xhr.responseText);
                var response = JSON.parse(xhr.responseText);
                handleResponse(response);
            } else {
                console.log("No errors, cool");
                window.location.href = "../main.php";
            }
        }
    };
})