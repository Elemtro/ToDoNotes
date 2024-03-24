<?php
include_once "session_set.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoNotes</title>
    <link rel="stylesheet" href="../styles/main-page/container.css">
    <link rel="stylesheet" href="../styles/main-page/main.css">
    <link rel="stylesheet" href="../styles/main-page/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script defer src="addSendAjax.js"></script>
    <script defer src="fetchDisplay.js"></script>
</head>

<body>
    <div class="page">
        <div class="first-line">
            <a href="../index.php" style="text-decoration:none">
                <div class="logo">
                    <img src="../images/ToDoNotes_icon.png" alt="logotype" class="logo-img">
                    <span class="text-logo">ToDoNotes</span>
                </div>
            </a>
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

                <form id="form" action="#" method="POST" style="display: none;">
                    <div id="error"></div>
                    <textarea type="text" name="taskInput" id="taskInput" rows="1" maxlength="700"></textarea>
                    <div class="buttons">
                        <button id="closeTaskInput" type="button">Close</button>
                        <button type="submit" class="addBtn">Add Task</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="notesContainer">
            <!-- Fetched notes will be displayed here -->
        </div>
    </div>


    <footer class="footer">
        <img src="../images/desktop.png" class="bottom-image-desktop">
        <img src="../images/laptop.png" class="bottom-image-laptop">
        <img src="../images/tablet.png" class="bottom-image-tablet">
        <img src="../images/mobile.png" class="bottom-image-mobile">
    </footer>
    <script defer src="taskAddBtn.js"></script>
    <script defer src="textResize.js"></script>
</body>

</html>