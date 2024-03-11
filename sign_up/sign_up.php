<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/sign-up/global.css">
    <link rel="stylesheet" href="../styles/sign-up/main.css">
    <link rel="stylesheet" href="../styles/sign-up/container.css">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script defer src="ajax_request.js"></script>
</head>

<body>
    <div class="page">
        <div class="first-line">
            <img src="../images/ToDoNotes_icon.png" alt="logotype" class="logo-img">
            <span class="text-logo">ToDoNotes</span>
        </div>

        <div class="form-container" id="form">
            <div style="display: block;">
                <h1 class="text">Lets create your user account</h1>
                <div class=middle-container>
                    <form action="#" method="POST" id=signup-form>

                        <div id="error_email"></div>
                        <input type="text" id="email" name="email" placeholder="Email" class="email">

                        <div id="error_password"></div>
                        <input type="password" id="password" name="password" placeholder="Password" class="password">

                        <div id="error_confirm_password"></div>
                        <input type="password" id="confirm-password" name="confirm" placeholder="Confirm Password" class="confirm-password">

                        <input type="submit" value="Sign Up" class="button-sign">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <img src="../images/desktop.png" class="bottom-image-desktop">
        <img src="../images/laptop.png" class="bottom-image-laptop">
        <img src="../images/tablet.png" class="bottom-image-tablet">
        <img src="../images/mobile.png" class="bottom-image-mobile">
    </footer>
</body>

</html>