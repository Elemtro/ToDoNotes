<?php
// Start the session
session_start();
/*
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in/log_in.php"); //header("Location: ../log_in/log_in.php");
    exit;
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoNotes</title>
    <link rel="stylesheet" href="styles/main-page/container.css">
    <link rel="stylesheet" href="styles/main-page/main.css">
    <link rel="stylesheet" href="styles/main-page/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page">
        <div class="first-line">
            <div class="logo">
                <img src="images/ToDoNotes_icon.png" alt="logotype" class="logo-img">
                <span class="text-logo">ToDoNotes</span>
            </div>
            <a href="">
                <button class="account">
                    Account
                </button>
            </a>
        </div>

        <div class="to-center">
            <div style="display:flex;">
                <div id="addTaskContainer">
                    <button class="addTaskBtn">Add Task</button>
                </div>

                <div id="form" style="display: none;" >
                    <textarea type="text" id="taskInput" rows="1"></textarea>
                    <div class="buttons">
                        <button id="closeTaskInput">Close</button>
                        <button type="submit" class="addBtn">Add Task</button>
                    </div>
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
    <script src="taskAdd.js"></script>
    <script src="textResize.js"></script>
</body>

</html>