<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoNotes</title>
    <link rel="stylesheet" href="styles/first-page/container.css">
    <link rel="stylesheet" href="styles/first-page/main.css">
    <link rel="stylesheet" href="styles/first-page/global.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page-container">
        <div class="first-line">
            <div class="logo">
                <img src="images/ToDoNotes_icon.png" alt="logotype" class="logo-img">
                <span class="text-logo">ToDoNotes</span>
            </div>
            <a href="">
                <button class="btn">
                    Source Code
                </button>
            </a>
        </div>

        <div class="to-center">
            <div style="display:block;">
                <div class="second-line">
                    <span class="text-bold" id="existing-text">
                        Streamline your tasks: your ultimate
                        To-Do list &amp; Notes hub
                    </span>
                </div>

                <div class="third-line">
                    <span class="text-under" id="log-in">
                        Unlock the full potential of our website:
                        Sign up or log in now to access exclusive features.
                        Rest assured, we respect your inbox –
                        no subscription emails, ever!
                    </span>
                </div>

                <div class="last-line">
                    <a href="log_in/log_in.php">
                        <button class="button-log">
                            Log In
                        </button>
                    </a>
                    <a href="sign_up/sign_up.php">
                        <button class="button-sign">
                            Sign Up
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <img src="images/desktop.png" class="bottom-image-desktop">
        <img src="images/laptop.png" class="bottom-image-laptop">
        <img src="images/tablet.png" class="bottom-image-tablet">
        <img src="images/mobile.png" class="bottom-image-mobile">
    </footer>

    <?php
    session_start();
    // Check if signup success parameter is present in URL query string
    if (isset($_GET['signup_success']) && $_GET['signup_success'] === 'true') {
        $_SESSION['signup_success'] = true;
    }
    ?>

    <script>
        //Change your text if signed up
        if (<?php echo isset($_SESSION['signup_success']) ? 'true' : 'false'; ?>) {
            document.getElementById("existing-text").innerText = "Congratulations! You're now part of our community!";
            document.getElementById("log-in").innerText = "Welcome aboard! Your account is all set. Let's start organizing your tasks!"
        }
    </script>

    <?php
    // Unset the session variable after displaying the congratulations message
    unset($_SESSION['signup_success']);
    ?>
</body>

</html>